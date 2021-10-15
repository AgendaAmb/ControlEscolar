<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\ShowUserRequest;
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
     * Endpoint de usuarios.
     */
    private const USERS = 'api/usuarios';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miPortalService = new MiPortalService;
    }

    /**
     * Obtiene la información general de los usuarios de la aplicación.
     */
    public function index()
    {
        # Obtiene el listado de reuniones.
        $response = $this->miPortalService->miPortalGet(self::USERS, ['module' => env('MIPORTAL_MODULE_ID')]);
        
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
        $response = $this->miPortalService->miPortalGet(self::USERS, [
            'filter[id]' => $data['id'],
            'filter[type]' => User::TYPES[$data['type']]
        ]);

        # Recolecta el resultado.
        $data = $response->collect()->first();

        # Devuelve el resultado
        return new JsonResponse($data, $response->status());
    }
}
