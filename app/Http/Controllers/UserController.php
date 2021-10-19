<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\ShowUserRequest;
use App\Http\Resources\InterviewAppliantsCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * El controlador consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\MiPortalService
     */
    private $miPortalService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miPortalService = new MiPortalService;
    }
    
    /**
     * Obtiene a los postulantes de la aplicación.
     */
    public function appliants()
    {
        $appliants = User::with(['latestArchive.intentionLetters:archive_intention_letter.user_id,archive_intention_letter.user_type'])
            ->hasArchive()
            ->appliant()
            ->get();
        
        # Obtiene el listado de reuniones.
        $response = $this->miPortalService->miPortalGet('api/usuarios', ['module' => env('MIPORTAL_MODULE_ID')]);

        # Recolecta el resultado.
        $data = $response->collect();
        
        # Filtra a los aspirantes.
        $miPortal_appliants = $data->where('user_type', 'students');

        # Filtra a los profesores
        $miPortal_workers = $data->where('user_type', 'workers');


        return new InterviewAppliantsCollection($appliants, $miPortal_workers, $miPortal_appliants);
    }

    /**
     * Obtiene la información general de los usuarios de la aplicación.
     */
    public function index()
    {
        # Obtiene el listado de reuniones.
        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'module' => env('MIPORTAL_MODULE_ID'),
            'filter[id]' => User::pluck('id'),
        ]);
        
        # Recolecta el resultado.
        $data = $response->collect();

        # Devuelve el resultado
        return new JsonResponse($data, $response->status());
    }

    /**
     * Recupera a un usuario del sistema central.
     */
    public function show(ShowUserRequest $request)
    {
        $data = $request->validated();

        # Busca al usuario.
        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'filter[id]' => $data['id'],
            'filter[type]' => User::TYPES[$data['type']]
        ]);

        # Recolecta el resultado.
        $data = $response->collect()->first();

        # Devuelve el resultado
        return new JsonResponse($data, $response->status());
    }
}
