<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\ShowUserRequest;
use App\Http\Resources\InterviewAppliantsCollection;
use App\Models\User;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
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

        $professors = User::role('profesor_nb')->pluck('id')->toArray();
        $responses = [];

        # Realiza 2 peticiones.
        # 1.- Obtiene a los postulantes.
        # 2.- Obtiene a los profesores.
        $responses[] = $this->miPortalService->miPortalGet('api/usuarios', [
            'module' => env('MIPORTAL_MODULE_ID'),
            'filter[id]' => $appliants->pluck('id')->toArray()
        ]);

        $responses[] = $this->miPortalService->miPortalGet('api/usuarios', [
            'module' => env('MIPORTAL_MODULE_ID'),
            'filter[id]' => $professors
        ]);

        # Recolecta el resultado.
        $miPortal_appliants = $responses[0]->collect();
        $miPortal_workers = $responses[1]->collect();

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
