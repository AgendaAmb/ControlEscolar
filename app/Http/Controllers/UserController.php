<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\CreateMeetingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
