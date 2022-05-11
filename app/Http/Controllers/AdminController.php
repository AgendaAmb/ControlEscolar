<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\StoreWorkerRequest;
use App\Models\AcademicArea;
use App\Models\AcademicComitte;
use App\Models\AcademicEntity;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtiene el listado de profesores y usuarios con rol de CE.
     *
     */
    public function index()
    {
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
        $users = User::with([
            'roles',
            'academicAreas',
            'academicEntities'

        ])->worker()->paginate(10000);

        return new JsonResponse($users, JsonResponse::HTTP_OK);
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
                'type' => ['required', 'string', 'max:225', 'in:workers,students'],
                'selected_roles' => ['required', 'array'],
                'selected_academic_areas' => ['required', 'array'],
                'selected_academic_entities' => ['required', 'array'],
                'selected_academic_comittes' => ['required', 'array'],

                'selected_roles.*' => ['required', 'numeric','exists:roles,id'],
                'selected_academic_areas.*' => ['required', 'numeric','exists:academic_areas,id'],
                'selected_academic_entities.*' => ['required', 'numeric','exists:academic_entities,id'],
                'selected_academic_comittes.*' => ['required', 'numeric','exists:academic_comittes,id'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error de validacion'], 200);
        }


        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'include' => 'userModules',
            'fields[users]' => 'id',
            'filter[id]' => $request->id,
        ]);


        # Recolecta el resultado.
        $data = $response->collect();

        # Verifica que haya un resultado en la búsqueda.
        if ($data->count() === 0)
            return new JsonResponse(['id' => 'No encontrado'], JsonResponse::HTTP_NOT_FOUND);

        # Verifica que el usuario pertenezca al módulo.
        if (collect($data->first())->where('id', env('MIPORTAL_MODULE_ID'))->count() > 0)
            return new JsonResponse(['id' => 'Usuario ya registrado'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        # Registra el módulo del usuario en el sistema central.
        $post_user_module_response = $this->miPortalService->miPortalPost('api/usuarios/modulos', [
            'module_id' => env('MIPORTAL_MODULE_ID'),
            'user_id' => $request->id,
            'user_type' => $request->type,
        ]);

        # Verifica que el usuario se pueda registrar al módulo.
        if ($post_user_module_response->failed())
            return new JsonResponse(['id' => 'Módulo de usuario no registrado en Mi Portal'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);

        # Crea al usuario.
        $user = User::create($request->safe()->only('id', 'type'));
        $user->roles()->syncWithPivotValues($request->safe()->selected_roles, ['model_type' => $request->type]);
        $user->academicAreas()->syncWithPivotValues($request->safe()->selected_academic_areas, ['user_type' => $request->type]);
        $user->academicEntities()->syncWithPivotValues($request->safe()->selected_academic_entities, ['user_type' => $request->type]);
        $user->academicComittes()->syncWithPivotValues($request->safe()->selected_academic_comittes, ['user_type' => $request->type]);
        $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);

        return new JsonResponse($user, JsonResponse::HTTP_CREATED);
    }

    public function updateWorker(Request $request)
    {
        
        try {
            $request->validate([
                'id' => ['required', 'numeric'],
                'type' => ['required', 'string', 'max:225', 'in:workers,students'],
                
                // 'selected_roles' => ['required', 'array', 'min:0', 'max:20'],
                // 'selected_academic_areas' => ['required', 'array','min:0', 'max:20'],
                // 'selected_academic_entities' => ['required', 'array','min:0', 'max:20'],
                // 'selected_academic_comittes' => ['required', 'array','min:0', 'max:20'],

                'selected_roles.*.id' => ['required', 'numeric','exists:roles,id'],
                'selected_academic_areas.*.id' => ['required', 'numeric','exists:academic_areas,id'],
                'selected_academic_entities.*id' => ['required', 'numeric','exists:academic_entities,id'],
                'selected_academic_comittes.*' => ['required', 'numeric','exists:academic_comittes,id'],

                
                'selected_roles.*.name' => ['required', 'string','max:225'],
                'selected_academic_areas.*.name' => ['required', 'string','max:225'],
                'selected_academic_entities.*.name' => ['required', 'string','max:225'],
                'selected_academic_comittes.*.name' => ['required', 'string','max:225'],

                
                // 'selected_roles.*' => ['required', 'numeric','exists:roles,id'],
                // 'selected_academic_areas.*' => ['required', 'numeric','exists:academic_areas,id'],
                // 'selected_academic_entities.*' => ['required', 'numeric','exists:academic_entities,id'],
                // 'selected_academic_comittes.*' => ['required', 'numeric','exists:academic_comittes,id'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error de validacion'], 200);
        }

        // return new JsonResponse($request, 200);


        try {
            # Busca al usuario.

            $response = $this->miPortalService->miPortalGet('api/usuarios', [
                'include' => 'userModules',
                'fields[users]' => 'id',
                'filter[id]' => $request->id,
            ]);

            # Recolecta el resultado.
            $data = $response->collect();

            # Verifica que haya un resultado en la búsqueda.
            if ($data->count() === 0){
                return new JsonResponse(['id' => 'No encontrado'], 401);
            }
            // return new JsonResponse(['message' => $data->first()], JsonResponse::HTTP_CREATED);
            # Verifica que el usuario pertenezca al módulo.
            // if (collect($data->first())->where('id', env('MIPORTAL_MODULE_ID'))->count() >= 0) {
                $selected_roles = [];
                foreach($request->selected_roles as $value ){
                    array_push($selected_roles, $value->id);
                }

                $selected_academic_entities = [];
                foreach($request->selected_roles as $value ){
                    array_push($selected_academic_entities, $value->id);
                }

                $selected_academic_areas = [];
                foreach($request->selected_roles as $value ){
                    array_push($selected_academic_areas, $value->id);
                }

                $selected_academic_comittes = [];
                foreach($request->selected_roles as $value ){
                    array_push($selected_academic_comittes, $value->id);
                }

                $user = User::where('id', $request->id)->first();
               
                $user->roles()->syncWithPivotValues($selected_roles, ['model_type' => $request->type]);
                $user->academicAreas()->syncWithPivotValues($selected_academic_areas, ['user_type' => $request->type]);
                $user->academicEntities()->syncWithPivotValues($selected_academic_entities, ['user_type' => $request->type]);
                $user->academicComittes()->syncWithPivotValues($selected_academic_comittes, ['user_type' => $request->type]);
                $user->save();
                // $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);
                // $user->roles()->syncWithPivotValues($request->safe()->selected_roles, ['model_type' => $request->type]);
                // $user->academicAreas()->syncWithPivotValues($request->safe()->selected_academic_areas, ['user_type' => $request->type]);
                // $user->academicEntities()->syncWithPivotValues($request->safe()->selected_academic_entities, ['user_type' => $request->type]);
                // $user->academicComittes()->syncWithPivotValues($request->safe()->selected_academic_comittes, ['user_type' => $request->type]);
                // $user->save();
                // $user->load(['academicAreas', 'academicEntities', 'academicComittes', 'roles']);
                
            // }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al hacer los cambios', 'data' => $data], 202);
        }

        return new JsonResponse($data, JsonResponse::HTTP_CREATED);
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
