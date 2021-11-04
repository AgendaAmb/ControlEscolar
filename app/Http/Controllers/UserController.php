<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowUserRequest;
use App\Http\Resources\InterviewAppliantsCollection;
use App\Models\User;
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
    public function appliants(Request $request)
    {   
        # Busca a los postulantes.
        $appliants = User::with([
            'latestArchive.intentionLetters:archive_intention_letter.user_id,archive_intention_letter.user_type'
        ])->hasArchive()->appliant()->get();
        
        # Recolecta el resultado.
        $miPortal_appliants = $request->session()->get('appliants');
        $miPortal_workers = $request->session()->get('workers');

        return $miPortal_appliants;
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
