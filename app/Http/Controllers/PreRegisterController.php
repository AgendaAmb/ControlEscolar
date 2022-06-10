<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Requests\PreRegisterRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\AcademicProgram;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Archive;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;

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
    private $curp_pattern = 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/i';

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
            ->with('academic_programs', $this->academic_programs)
            ->with('img_header', asset('storage/headers/logod.png'));
    }

    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function miPortalUser(Request $request)
    {
        //return new JsonResponse($request->email, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        //a278737@alumnos.uaslp.mx
        # Busca al usuario en el sistema de MiPortal.
        if ($request->email == null || $request->email == "" || $request->email == " ") {
            return new JsonResponse("datos erroneos", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

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
    public function store(Request $request)
    {
        

        # -------------------- Validacion
        $casts = [
            'true' => true,
            'false' => false,
            'null' => null
        ];

        $request->merge([
            'name' => $casts[$request->name] ?? $request->name,
            'middlename' => $casts[$request->middlename] ?? $request->middlename, 
            'surname' =>  $casts[$request->surname] ?? $request->surname, 

            'tipo_usuario' => $casts[$request->tipo_usuario] ??$request->tipo_usuario,
            'pertenece_uaslp' => $casts[$request->pertenece_uaslp] ?? null,
            
            'clave_uaslp' => $casts[$request->clave_uaslp] ?? $request->clave_uaslp,
            'directorio_activo' => $casts[$request->directorio_activo] ?? $request->directorio_activo,

            'no_curp' => $casts[$request->no_curp] ?? null,
            'is_disabled' => $casts[$request->is_disabled] ?? null,
            'curp' => $casts[$request->curp] ?? $request->curp,
            
            'email' =>  $casts[$request->email] ?? $request->email,
            'altern_email' => $casts[$request->altern_email] ?? $request->altern_email,
            'password' => $casts[$request->password] ?? $request->password,
            'rpassword' => $casts[$request->rpassword] ?? $request->rpassword,
            
            'ocupation' => $casts[$request->ocupation] ?? $request->ocupation,
            'other_gender' => $casts[$request->other_gender] ?? $request->other_gender,
            'other_civic_state' => $casts[$request->other_civic_state] ?? $request->other_civic_state,
            'birth_country' => $casts[$request->birth_country] ?? $request->birth_country,
            'birth_state' => $casts[$request->birth_state] ?? $request->birth_state,
            'residence_country' => $casts[$request->residence_country] ?? $request->residence_country,

            'nationality' => $request->birth_country,
            'residence' => $request->residence_country
        ]);


        if($request->curp != null){
            $val = Validator::make($request->all(), [
                'announcement_id' => ['required', 'exists:announcements,id'],
                'tipo_usuario' => ['required', 'string', 'max:255'],
                'pertenece_uaslp' => ['required', 'boolean'],
                'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true',  'prohibited_if:pertenece_uaslp,false','numeric'],
                'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'string'],            
                'email' => ['required', 'string', 'email', 'max:255' ],
                'altern_email' => ['required', 'different:email', 'string', 'email', 'max:255' ],
                'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'string', 'max:255'],
                'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'same:password', 'string', 'max:255'],
                'no_curp' => ['required', 'boolean'],
                'curp' => ['nullable', 'required_if:no_curp,false'],
                'name' => ['required', 'string', 'max:255'],
                'middlename' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
                'ocupation' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'in:Masculino,Femenino,Otro,No especificar'],
                'other_gender' => ['nullable', 'required_if:gender,Otro'],
                'civic_state' => ['required', 'string'],
                'other_civic_state' => ['nullable', 'required_if:civic_state,Otro'],
                'birth_country' => ['required', 'string', 'max:255'],
                'birth_state' => ['required', 'string', 'max:255'],
                'residence_country' => ['required', 'string', 'max:255'],
                'zip_code' => ['required', 'numeric'],
                'phone_number' => ['required', 'numeric'],
                'is_disabled' => ['required', 'boolean'],
                'ethnicity' => ['required', 'string', 'max:255'],
                'disability' => ['nullable', 'required_if:is_disabled,true'],
                'nationality' => ['required', 'same:birth_country'],
                'residence' => ['required', 'same:residence_country']
            ]);
        }else{
            $val = Validator::make($request->all(), [
                'announcement_id' => ['required', 'exists:announcements,id'],
                'tipo_usuario' => ['required', 'string', 'max:255'],
                'pertenece_uaslp' => ['required', 'boolean'],
                'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true',  'prohibited_if:pertenece_uaslp,false','numeric'],
                'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'string'],            
                'email' => ['required', 'string', 'email', 'max:255' ],
                'altern_email' => ['required', 'different:email', 'string', 'email', 'max:255' ],
                'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'string', 'max:255'],
                'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'same:password', 'string', 'max:255'],
                'no_curp' => ['required', 'boolean'],
                'curp' => ['nullable', 'required_if:no_curp,false', 'size:18', $this->curp_pattern],
                'name' => ['required', 'string', 'max:255'],
                'middlename' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
                'ocupation' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'in:Masculino,Femenino,Otro,No especificar'],
                'other_gender' => ['nullable', 'required_if:gender,Otro'],
                'civic_state' => ['required', 'string'],
                'other_civic_state' => ['nullable', 'required_if:civic_state,Otro'],
                'birth_country' => ['required', 'string', 'max:255'],
                'birth_state' => ['required', 'string', 'max:255'],
                'residence_country' => ['required', 'string', 'max:255'],
                'zip_code' => ['required', 'numeric'],
                'phone_number' => ['required', 'numeric'],
                'is_disabled' => ['required', 'boolean'],
                'ethnicity' => ['required', 'string', 'max:255'],
                'disability' => ['nullable', 'required_if:is_disabled,true'],
                'nationality' => ['required', 'same:birth_country'],
                'residence' => ['required', 'same:residence_country']
            ]);
            

        }
       

        // if($request->curp != null){
        //     $request->validate([
        //         'curp' => ['required', 'size:18', $this->curp_pattern]
        //     ]);
        // }


        #------------------------ Verifica validacion
        if ($val->fails()) {
            return new JsonResponse($val->errors(), 504);
        }

        # ---------------------------------------------------- Crear Usuario.
        
        # -------------------------- Datos a validar en Portal.
        $data = $request->except(['announcement_id','civic_state','other_civic_state','birth_state' ]); //data to save

        // return new JsonResponse(['message' => 'Esto es una prueba para curp', 'curp' => $request->curp], 500);

        
         # ------------------------- Creacion de usuario en portal Agenda Ambiental
        try {
            $data['module_id'] = 2; //2 = control escolar
            $response = $this->service->miPortalPost('api/RegisterExternalUser', $data); // solo hace registro y avisas si salio bien o mal
            $response_data = $response->collect()->toArray();
        } catch (\Exception $e) {
            return new JsonResponse('Error al crear usuario en Portal Agenda Ambiental', 500);
        }

        #No se pudo crear usuario en portal
        if($response_data['message']){
            if($response_data['message']!='¡Usuario Creado! y/o modulo actualizado'){
                return new JsonResponse(['message' => $response_data['message']], 500);
            }
        }else{
            return new JsonResponse(['message' => 'Error al crear usuario en Portal'], 500);
        }

         # ------------------------- Creacion de usuario en control escolar
         try {
            # Se crea el usuario.
            $user = User::create([
                'id' => $response_data['user_id'], 
                'type' => $request->tipo_usuario,
                'birth_state' => $request->birth_state,
                'marital_state' => $request->civic_state
            ]);
        } catch (\Exception $e) {
            // return new JsonResponse("Error al crear el usuario o ya existe el usuario", 502);
            return new JsonResponse($response_data, 502);

        }

        # ------------- Asigna rol a usuario
        if ($request->birth_state === 'San Luis Potosi') {
            $user->assignRole('aspirante_local');
        } else if ($request->birth_country === 'México') {
            $user->assignRole('aspirante_foraneo');
        } else {
            $user->assignRole('aspirante_extranjero');
        }

        # ------------- Genera el expediente del postulante.
        $user->archives()->create([
            'user_type' => $request->tipo_usuario,
            'announcement_id' => $request->announcement_id,
            'status' => 0,
        ]);


        # La petición no pudo llevarse a cabo. Un error de datos por parte del
        # cliente o del servidor.
        if ($response->failed()) {
            // return new JsonResponse($response_data['errors'],200);
            $response_data['errors']['email_alterno'] = $response_data['errors']['altern_email'] ?? null;
            $response_data['errors']['first_surname'] = $response_data['errors']['middlename']  ?? null;
            $response_data['errors']['last_surname'] = $response_data['errors']['surname'] ?? null;
            $response_data['errors']['birth_country'] = $response_data['errors']['nationality'] ?? null;
            $response_data['errors']['birth_state'] = $response_data['errors']['residence'] ?? null;
            $response_data['errors'] = collect($response_data['errors'])
                ->filter(fn ($val, $key) => $val !== null)
                ->toArray();

            return new JsonResponse('Aqui ando', JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        # --------------------- Log In del usuario 
        $this->loginAfterRegister($user->id, $request); //con esto ya deberia estar autenticado

        # --------------------- Respuesta de éxito.
        return new JsonResponse(['message' => 'Éxito'], JsonResponse::HTTP_CREATED);
    }

    public function loginAfterRegister($user_id, $request)
    {
        Auth::loginUsingId($user_id);

        /** @var User */
        $auth_user = Auth::user();
        $auth_user->load('roles');

        # Guarda al usuario autenticado.
        $request->session()->put('user', $auth_user);


        # Solo solicita los datos, siempre y cuando el usuario sea un postulante.
        //if (!$user->isWorker())
        //    return;
        /** @var User */
        # Carga otros datos que requiere el modelo.
        $auth_user->load(['academicAreas', 'academicEntities']);

        # Busca a los postulantes.
        $appliants = User::with(['latestArchive.intentionLetters:archive_intention_letter.user_id,archive_intention_letter.user_type'])
            ->hasArchive()
            ->appliant()
            ->pluck('id');

        # Busca a los profesores en el sistema.
        $professors = User::role(['profesor_nb', 'admin', 'control_escolar', 'personal_apoyo'])->pluck('id');

        # Fusiona a los usuarios.
        $users = $professors->merge($appliants)->toArray();


        try{
            #Peticion a portal (Busca usuario)
            $user_data =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => Auth::user()->id])->collect();
            $request->session()->put('user_data', $user_data[0]);
            
        }catch (\Exception $e) {
            return new JsonResponse('Peticion erronea',502);
        }

        # Carga modelos si es administrador o profesor
        if ($user_data[0]['user_type'] != 'students') {

            # Usuario trabajador / Administrador
            $response = $this->service->miPortalGet('api/usuarios', [
                'filter[userModules.id]' => env('MIPORTAL_MODULE_ID'),
                //'fields[users]' => 'id,name,middlename,surname,type,curp,email',
                'filter[id]' => $users
            ]);

            # Recolecta el resultado.
            $miPortal_appliants = $response->collect()->whereNotIn('user_type', ['workers']);
            $miPortal_workers = $response->collect()->where('user_type', 'workers');

            # Guarda a los usuarios del sistema central en la sesión.
            $request->session()->put('appliants', $miPortal_appliants);
            $request->session()->put('workers', $miPortal_workers);
        }
        
    }
}
