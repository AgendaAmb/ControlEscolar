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
            ->with('roles', Role::select(['id','name'])->get())
            ->with('academic_areas', AcademicArea::select(['id','name'])->get())
            ->with('academic_entities', AcademicEntity::select(['id','name'])->get())
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
        
        ])->worker()->paginate(100);

        return new JsonResponse($users, JsonResponse::HTTP_OK);
    }

    /**
     * Agrega a un usuario.
     *
     */
    public function newWorker(StoreWorkerRequest $request)
    {
        # Busca al usuario.
        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'include' => 'userModules',
            'fields[users]' => 'id',
            'filter[id]' => $request->id,
        ]);
        
        # Recolecta el resultado.
        $data = $response->collect();

        # Verifica que haya un resultado en la búsqueda.
        if ($data->count() === 0)
            return new JsonResponse(['id'=>'No encontrado'], JsonResponse::HTTP_NOT_FOUND);

        # Verifica que el usuario pertenezca al módulo.
        if (collect($data->first())->where('id', env('MIPORTAL_MODULE_ID'))->count() > 0)       
            return new JsonResponse(['id'=>'Usuario ya registrado'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); 

        # Registra el módulo del usuario en el sistema central.
        $post_user_module_response = $this->miPortalService->miPortalPost('api/usuarios/modulos', [
            'module_id' => env('MIPORTAL_MODULE_ID'),
            'user_id' => $request->id,
            'user_type' => $request->type,
        ]);

        # Verifica que el usuario se pueda registrar al módulo.
        if ($post_user_module_response->failed())       
            return new JsonResponse(['id'=>'Módulo de usuario no registrado en Mi Portal'], JsonResponse::HTTP_SERVICE_UNAVAILABLE); 

        # Crea al usuario.
        $user = User::create($request->safe()->only('id', 'type'));
        $user->roles()->syncWithPivotValues($request->safe()->selected_roles, ['model_type' => $request->type]);
        $user->academicAreas()->syncWithPivotValues($request->safe()->selected_academic_areas, ['user_type' => $request->type]);
        $user->academicEntities()->syncWithPivotValues($request->safe()->selected_academic_entities, ['user_type' => $request->type]);
        $user->academicComittes()->syncWithPivotValues($request->safe()->selected_academic_comittes, ['user_type' => $request->type]);
        $user->load(['academicAreas','academicEntities','academicComittes','roles']);
        
        return new JsonResponse($user, JsonResponse::HTTP_CREATED);
    }
        
    //necesita la request y la ruta hacia la api del portal
    public function pruebaRegistro()
    {
        $service = new MiPortalService;
        // 
        $res = $service->miPortalPost('api/RegisterExternalUser',['Hola']);
        return $res;
    }
}
