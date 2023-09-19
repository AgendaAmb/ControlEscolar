<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\StoreWorkerRequest;
use App\Models\AcademicArea;
use App\Models\AcademicComitte;
use App\Models\AcademicEntity;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    /**
     * Web service de Mi portal.
     * 
     * @var \App\Helpers\MiPortalService
     */
    private $service;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->service = new MiPortalService;
        parent::__construct();
    }

    /**
     * Obtiene el listado de profesores y usuarios con rol de CE.
     *
     */
    public function index()
    {
        $reolesv = Role::select(['id', 'name'])->get();
        echo $reolesv;
        return view('admin.index')
            ->with('roles', Role::select(['id', 'name'])->get())
            ->with('academic_areas', AcademicArea::select(['id', 'name'])->get())
            ->with('academic_entities', AcademicEntity::select(['id', 'name'])->get())
            ->with('academic_comittes', AcademicComitte::select(['id', 'name'])->get());
    }

    /**
     * Obtiene el listado de usuarios.
     *
     */
    public function workers()
    {
        $workers = User::with([
            'roles',
            'academicAreas',
            'academicEntities',
            'academicComittes'

        ])->worker()->paginate(10000);


        // $students = User::with([
        //     'roles'
        // ])->where('type','students')->paginate(10000);

        return new JsonResponse($workers, JsonResponse::HTTP_OK);
    }


    public function getNameWorkers(Request $request)
    {
        // Get all workers
        $workers = User::with([
            'roles',
        ])->worker()->get();

        $professors = [];
        $names = [];
        // return new JsonResponse($workers[0]->roles[0]->name, JsonResponse::HTTP_OK);

        // filter only professors
        foreach($workers as $worker){
            foreach($worker->roles as $rol){
                if(strcmp($rol->name,'profesor_nb') || strcmp($rol->name,'profesor_colaborador')){
                    array_push($professors, $worker);
                    break;
                }
            }
        }

        // retrieve names only
        try {
            foreach ($professors as $proffesor) {
                array_push($names, $this->getDataFromPortalUser($proffesor));
            }
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        // return names
       
        return new JsonResponse($names, JsonResponse::HTTP_OK);
    }

    public function getDataFromPortalUser($proffesor)
    {
        #Search user in portal
        $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $proffesor->id])->collect();

        #Save only the first user that the portal get reach
        $user_data = $user_data_collect[0];

        #Add data of user from portal to the collection in controlescolar
        // $worker->setAttribute('name', ucfirst($user_data['name']) . ' ' . ucfirst($user_data['surname']) . ' ' . ucfirst($user_data['middlename']));
        // return $worker;
        // $name = strtolower($user_data['name'] . ' ' .$user_data['surname'] . ' ' . $user_data['middlename']);
        // return ucwords($name);     
        return (ucfirst($user_data['name']) . ' ' . ucfirst($user_data['surname']) . ' ' .ucfirst($user_data['middlename']));        
    }

    /**
     * Agrega a un usuario.
     *
     */
    public function newWorker(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'numeric'],
                'type' => ['required', 'string', 'max:225'],
                // 'selected_roles' => ['required', 'array'],
                // 'selected_academic_areas' => ['required', 'array'],
                // 'selected_academic_entities' => ['required', 'array'],
                // 'selected_academic_comittes' => ['required', 'array'],

                'selected_roles.*' => ['required', 'numeric', 'exists:roles,id'],
                'selected_academic_areas.*' => ['required', 'numeric', 'exists:academic_areas,id'],
                'selected_academic_entities.*' => ['required', 'numeric', 'exists:academic_entities,id'],
                'selected_academic_comittes.*' => ['required', 'numeric', 'exists:academic_comittes,id'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error de validacion'], 200);
        }


        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'include' => 'userModules',
            'fields[users]' => 'id',
            'filter[id]' => $request->id,
        ]);

        # Verifica que el usuario se pueda registrar al módulo.
        if ($response->failed()) {
            return new JsonResponse(['message' => 'El usuario no existe en el sistema, intente con otro diferente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        # Recolecta el resultado.
        $data = $response->collect();
        $user_modules = collect($data->first())['user_modules'];
        $has_control_escolar = false;
        # Verifica que el usuario pertenezca al módulo.
        # Caso contrario lo agrega
        foreach ($user_modules as $module) {
            if ($module['id'] === intval(env('MIPORTAL_MODULE_ID'))) {
                $has_control_escolar = true;
            }
        }

        if ($has_control_escolar != true) {
            # Registra el módulo del usuario en el sistema central.
            $post_user_module_response = $this->miPortalService->miPortalPost('api/usuarios/modulos', [
                'module_id' => intval(env('MIPORTAL_MODULE_ID')),
                'user_id' => $request->id,
                'user_type' => $request->type,
            ]);

            # Verifica que el usuario se pueda registrar al módulo.
            if ($post_user_module_response->failed()) {
                return new JsonResponse(['message' => 'Módulo de usuario no registrado en Mi Portal'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            }
        } else {
            try {
                $user = User::where('id', $request->id)->first();
                if ($user === null) {
                    $user = User::create($request->only('id', 'type'));
                }
                $user->roles()->syncWithPivotValues($request->selected_roles, ['model_type' => $request->type]);
                $user->academicAreas()->syncWithPivotValues($request->selected_academic_areas, ['user_type' => $request->type]);
                $user->academicEntities()->syncWithPivotValues($request->selected_academic_entities, ['user_type' => $request->type]);
                $user->academicComittes()->syncWithPivotValues($request->selected_academic_comittes, ['user_type' => $request->type]);
                // $user->save();
                $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'El usuario ya existe en control escolar pero no se pudo actualizar su información'],  JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            return new JsonResponse(['message' => 'El usuario ya existia en el sistema pero se actualizo correctamente su información ', 'user' => $user], JsonResponse::HTTP_CREATED);
        }


        # Crea al usuario.
        $user = User::create($request->only('id', 'type'));
        $user->roles()->syncWithPivotValues($request->selected_roles, ['model_type' => $request->type]);
        $user->academicAreas()->syncWithPivotValues($request->selected_academic_areas, ['user_type' => $request->type]);
        $user->academicEntities()->syncWithPivotValues($request->selected_academic_entities, ['user_type' => $request->type]);
        $user->academicComittes()->syncWithPivotValues($request->selected_academic_comittes, ['user_type' => $request->type]);
        $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);

        return new JsonResponse(['message' => 'Se ha registrado correctamente al usuario ', 'user' => $user], JsonResponse::HTTP_CREATED);
    }

    public function updateWorker(Request $request)
    {

        try {
            $request->validate([
                'id' => ['required', 'numeric'],
                'type' => ['required', 'string', 'max:225', 'in:workers,students'],
                'selected_roles.*' => ['required', 'numeric', 'exists:roles,id'],
                'selected_academic_areas.*' => ['required', 'numeric', 'exists:academic_areas,id'],
                'selected_academic_entities.*' => ['required', 'numeric', 'exists:academic_entities,id'],
                'selected_academic_comittes.*' => ['required', 'numeric', 'exists:academic_comittes,id'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error de validacion'], 200);
        }

        try {
            # Busca al usuario.

            $response = $this->miPortalService->miPortalGet('api/usuarios', [
                'include' => 'userModules',
                'fields[users]' => 'id',
                'filter[id]' => $request->id,
            ]);

            # Recolecta el resultado.
            $data = $response->collect();
            $user_modules = collect($data->first())['user_modules'];
            $has_control_escolar = false;
            # Verifica que el usuario pertenezca al módulo.
            # Caso contrario lo agrega
            foreach ($user_modules as $module) {
                if ($module['id'] === intval(env('MIPORTAL_MODULE_ID'))) {
                    $has_control_escolar = true;
                }
            }

            if ($has_control_escolar != true) {
                try {
                    # Registra el módulo del usuario en el sistema central.
                    $post_user_module_response = $this->miPortalService->miPortalPost('api/usuarios/modulos', [
                        'module_id' => intval(env('MIPORTAL_MODULE_ID')),
                        'user_id' => $request->id,
                        'user_type' => $request->type,
                    ]);

                    # Verifica que el usuario se pueda registrar al módulo.
                    if ($post_user_module_response->failed()) {
                        return new JsonResponse(['message' => 'Módulo de usuario no registrado en Mi Portal'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
                    }
                } catch (\Exception $e) {
                    return new JsonResponse(['message' => $e],  JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
                }
            }


            $user = User::where('id', $request->id)->first();
            $user->roles()->syncWithPivotValues($request->selected_roles, ['model_type' => $request->type]);
            $user->academicAreas()->syncWithPivotValues($request->selected_academic_areas, ['user_type' => $request->type]);
            $user->academicEntities()->syncWithPivotValues($request->selected_academic_entities, ['user_type' => $request->type]);
            $user->academicComittes()->syncWithPivotValues($request->selected_academic_comittes, ['user_type' => $request->type]);
            // $user->save();
            $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e, 'data' => $data], 401);
        }

        return new JsonResponse(['message' => 'Cambios realizados correctamente', 'user' => $user], JsonResponse::HTTP_CREATED);
    }

    public function deleteWorker(Request $request)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'module_id' => ['required', 'numeric'],
            'type' => ['required', 'string', 'max:225', 'in:workers,students'],
        ]);

        try {
            $response = $this->miPortalService->miPortalPost('api/usuarios/deleteModulo', [
                'module_id' => intval(env('MIPORTAL_MODULE_ID')),
                'user_id' => $request->id,
                'user_type' => $request->type,
            ]);

            if ($response->failed()) {
                return new JsonResponse(['message' => 'Módulo de usuario no registrado en Mi Portal'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            }


            $user = User::where('id', $request->id)->first();
            $user->forceDelete();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se encontro al usuario a eliminar'],  JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        return new JsonResponse(['message' => 'Usuario eliminado'], JsonResponse::HTTP_CREATED);
    }

    //necesita la request y la ruta hacia la api del portal
    public function pruebaRegistro()
    {
        //$u = User::where('id',278737)->first();
        //if($u){
        //return $u;
        //}

        return 'x';

        //$service = new MiPortalService;
        // 
        //$res = $service->miPortalPost('api/RegisterExternalUser',['Hola']);
        //return $res;
    }
}
