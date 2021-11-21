<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\PreRegisterRequest;
use App\Models\AcademicProgram;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    /**
     * Programas académicos a los cuales el postulante puede aplicar
     * 
     * @var Illuminate\Eloquent\Collection
     */
    private $academic_programs;

    /**
     * Web service de Mi portal.
     * 
     * @var \App\Helpers\MiPortalService
     */
    private $service;

    /**
     * Construye al controlador y genera las dependencias requeridas.
     * 
     */
    public function __construct()
    {
        $this->academic_programs = AcademicProgram::all();
        $this->service = new MiPortalService;
    }

    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function index()
    {
        return view('pre-registro.index')
            ->with('academic_programs', $this->academic_programs);
    }

    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function miPortalUser(Request $request)
    {
        # Busca al usuario en el sistema de MiPortal.
        $response = $this->service->miPortalGet('api/usuarios', ['filter[email]' => $request->email]);
        $response_data = $response->collect();

        # La solicitud no fue llevada a cabo correctamente.
        if ($response->failed())
            return new JsonResponse($response_data, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        # No se encontraron coincidencias.
        if ($response_data->count() === 0)
            return new JsonResponse(['email' => 'Sin resultados'], JsonResponse::HTTP_NOT_FOUND);

        # Devuelve los datos.
        return new JsonResponse($response_data, JsonResponse::HTTP_OK);
    }


    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function store(PreRegisterRequest $request)
    {
        # Obtiene los datos validados.
        $data = $request->safe()->except('announcement_id');
        $data['module_id'] = env('MIPORTAL_MODULE_ID');

        # Envía la petición de registro de usuario al sistema principal.
        $response = $this->service->miPortalPost('api/users', $data);
        $response_data = $response->collect()->toArray();
        
        # La petición no pudo llevarse a cabo. Un error de datos por parte del
        # cliente o del servidor.
        if ($response->failed())
        {
            $response_data['errors']['email_alterno'] = $response_data['errors']['altern_email'] ?? null;
            $response_data['errors']['first_surname'] = $response_data['errors']['middlename']  ?? null;
            $response_data['errors']['last_surname'] = $response_data['errors']['surname'] ?? null;
            $response_data['errors']['birth_country'] = $response_data['errors']['nationality'] ?? null;
            $response_data['errors']['birth_state'] = $response_data['errors']['residence'] ?? null;
            $response_data['errors'] = collect($response_data['errors'])
                ->filter(fn($val, $key) => $val !== null)
                ->toArray();

            return new JsonResponse($response_data, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        # Se crea el usuario.
        $user = User::create([
            'id' => $response_data['id'],
            'type' => $response_data['user_type'],
            'birth_state' => $data['birth_state'],
            'marital_state' => $data['civic_state']
        ]);

        # Determina el tipo de postulante.
        if ($data['birth_state'] === 'San Luis Potosi')
            $user->assignRole('aspirante_local');
        else if ($data['birth_country'] === 'México')
            $user->assignRole('aspirante_foraneo');
        else 
            $user->assignRole('aspirante_extranjero');

        # Genera el expediente del postulante.
        $user->archives()->create([
            'user_type' => $response_data['user_type'],
            'announcement_id' => $request->announcement_id,           
            'status' => 0,
        ]);

        # Registra al postulante al módulo de control escolar.
        $this->service->miPortalPost('api/usuarios/modulos', [
            'module_id' => env('MIPORTAL_MODULE_ID'),
            'user_id' => $data['id'],
            'type' => $data['user_type']
        ]);        

        # Respuesta de éxito.
        return new JsonResponse(['message' => 'Éxito'], JsonResponse::HTTP_CREATED);
    }
}
