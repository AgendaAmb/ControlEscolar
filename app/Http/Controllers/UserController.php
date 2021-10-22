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
        # Busca a aquellos postulantes que no tengan programada una entrevista.
        $appliants = User::with(['latestArchive.intentionLetters:archive_intention_letter.user_id,archive_intention_letter.user_type'])
            ->hasArchive()
            ->appliant()
            ->noInterviews()
            ->get();

        # Busca a los profesores en el sistema.
        $professors = User::role('profesor_nb')->pluck('id');
        
        # Fusiona a los usuarios.
        $users = $professors->merge($appliants->pluck('id'))->toArray();

        # Consulta a los usuarios.
        $response = $this->miPortalService->miPortalGet('api/usuarios', [
            'filter[userModules.id]' => env('MIPORTAL_MODULE_ID'),
            'fields[users]' => 'id,name,middlename,surname,type',
            'filter[id]' => $users
        ]);

        # Recolecta el resultado.
        $miPortal_appliants = $response->collect()->where('user_type', 'students');
        $miPortal_workers = $response->collect()->where('user_type', 'workers');

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
