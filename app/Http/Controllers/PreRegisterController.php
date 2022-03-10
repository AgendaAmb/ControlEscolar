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
            ->with('academic_programs', $this->academic_programs);
    }

    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function miPortalUser(Request $request)
    {
        //return new JsonResponse($request->email, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        //a278737@alumnos.uaslp.mx
        # Busca al usuario en el sistema de MiPortal.
        if($request->email == null || $request->email == "" || $request->email == " "){
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
        //return new JsonResponse($request,200);
        # Cast de tipos de datos :v
        $casts = [
            'true' => true,
            'false' => false,
            'null' => null
        ];
        
        $request->merge([
            'name' => $casts[$request->name] ?? $request->name, 
            'first_surname' => $casts[$request->first_surname] ?? $request->first_surname, 
            'last_surname' => $casts[$request->last_surname] ?? $request->last_surname, 
            'pertenece_uaslp' => $casts[$request->pertenece_uaslp] ?? null, 
            'no_curp' => $casts[$request->no_curp] ?? null,
            'is_disabled' => $casts[$request->is_disabled] ?? null,
            'clave_uaslp' => $casts[$request->clave_uaslp] ?? $request->clave_uaslp,            
            'directorio_activo' => $casts[$request->directorio_activo] ?? $request->directorio_activo,
            'curp' => $casts[$request->curp] ?? $request->curp,
            'password' => $casts[$request->password] ?? $request->password,
            'rpassword' => $casts[$request->rpassword] ?? $request->rpassword,
            'ocupation' => $casts[$request->ocupation] ?? $request->ocupation,
            'other_gender' => $casts[$request->other_gender] ?? $request->other_gender,
            'other_civic_state' => $casts[$request->other_civic_state] ?? $request->other_civic_state,
            'birth_country' => $casts[$request->birth_country] ?? $request->birth_country,
            'birth_state' => $casts[$request->birth_state] ?? $request->birth_state,
            'residence_country' => $casts[$request->residence_country] ?? $request->residence_country,
            'altern_email' => $request->email_alterno,
            'middlename' => $request->first_surname,
            'surname' => $request->last_surname,
            'nationality' => $request->birth_country,
            'residence' => $request->residence_country
        ]);

        $val = Validator::make($request->all(),[
            'announcement_id' => ['required','exists:announcements,id'],
            'pertenece_uaslp' => ['required', 'boolean'],
            'clave_uaslp' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'numeric'],
            'directorio_activo' => ['nullable', 'required_if:pertenece_uaslp,true', 'prohibited_if:pertenece_uaslp,false', 'string'],
            'email' => [ 'required', 'string', 'email', 'max:255' ],
            'email_alterno' => [ 'required', 'string', 'email', 'max:255' ],
            'password' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'string', 'max:255'],
            'rpassword' => ['nullable', 'required_if:pertenece_uaslp,false', 'prohibited_if:pertenece_uaslp,true', 'same:password','string', 'max:255'],
            'curp' => ['nullable', 'required_if:no_curp,false',  'size:18', $this->curp_pattern,],
            'name' => ['required', 'string', 'max:255' ],
            'first_surname' => ['required','string','max:255'],
            'last_surname' => ['nullable'],
            'birth_date' => ['required','date', 'before:'.Carbon::now()->toString(), ],
            'ocupation' => ['required', 'string', 'max:255'],
            'gender' => [ 'required', 'string', 'in:Masculino,Femenino,Otro,No especificar' ],
            'other_gender' => ['nullable','required_if:gender,Otro'],
            'civic_state' => [ 'required', 'string', 'in:Soltero,Casado,Divorciado,Viudo,Otro,No especificar' ],
            'other_civic_state' => ['nullable','required_if:civic_state,Otro'],
            'birth_country' => ['required','string','max:255'],
            'birth_state' => ['required','string','max:255'],
            'residence_country' => ['required','string','max:255'],
            'zip_code' => ['required', 'numeric'],
            'phone_number' => ['required','numeric'],
            'is_disabled' => ['required', 'boolean'],
            'ethnicity' => ['required','string','max:255'],
            'disability' => ['nullable','required_if:is_disabled,true'],
            'altern_email' => ['required', 'same:email_alterno'],
            'middlename' => ['required', 'same:first_surname'],
            'surname' => ['required', 'same:last_surname'],
            'nationality' => ['required', 'same:birth_country'],
            'residence' => ['required', 'same:residence_country']
        ]);

        if ($val->fails()) {
            return new JsonResponse($val->errors(), 504);
         }

        //return new JsonResponse('hola',200);
        // return new JsonResponse("hola",200);
        $data = $request->except('announcement_id');

        //3 opciones posibles tipo_usuario
        /*
         Comunidad AA
         Comunidad UASLP
         Ninguno
         */
        //if($request->tipo_usuario == "Comunidad UASLP" || $request->tipo_usuario == "Ninguno"){ //borre este if porque ahora lo hago desde el portal para actualizar tambien el modulo
            # Obtiene los datos validados.
            try{
                //$data['module_id'] = env('MIPORTAL_MODULE_ID');
                $data['module_id'] = 2; //2 = control escolar

                # Envía la petición de registro de usuario al sistema principal.
                $response = $this->service->miPortalPost('api/RegisterExternalUser', $data); // solo hace registro y avisas si salio bien o mal
                $response_data = $response->collect()->toArray();
            }catch(\Exception $e){
                return new JsonResponse($e->getMessage(),500);
            }
            
            
            # La petición no pudo llevarse a cabo. Un error de datos por parte del
            # cliente o del servidor.
            if ($response->failed())
            {
                // return new JsonResponse($response_data['errors'],200);
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
        //}
        
        try{
            # Se crea el usuario.
            $user = User::create([
                'id' => $request->clave_uaslp,
                'type' => $request->tipo_usuario,
                'birth_state' => $data['birth_state'],
                'marital_state' => $data['civic_state']
            ]);
        }catch(\Exception $e){
            return new JsonResponse("Error al crear el usuario o ya existe el usuario",502);
        }

        //return new JsonResponse('hola1',500);

        # Determina el tipo de postulante.
        if ($data['birth_state'] === 'San Luis Potosi')
            $user->assignRole('aspirante_local');
        else if ($data['birth_country'] === 'México')
            $user->assignRole('aspirante_foraneo');
        else 
            $user->assignRole('aspirante_extranjero');

        //return new JsonResponse('hola2',500);

        # Genera el expediente del postulante.
        $user->archives()->create([
            'user_type' => $request->tipo_usuario,
            'announcement_id' => $request->announcement_id,           
            'status' => 0,
        ]);

        //return new JsonResponse('hola3',500);
        
        
            //Auth::loginUsingId($user->id); //esto solo lo autentica pero no le carga sus datos

        
            $this->loginAfterRegister($user->id,$request); //con esto ya deberia estar autenticado

            // # Registra al postulante al módulo de control escolar.
            // $this->service->miPortalPost('api/usuarios/modulos', [
            //     'module_id' => env('MIPORTAL_MODULE_ID'),
            //     'user_id' => $data['id'],
            //     'type' => $data['user_type']
            // ]);    

            //return new JsonResponse('hola4',200);

            # Respuesta de éxito.
        return new JsonResponse(['message' => 'Éxito'], JsonResponse::HTTP_CREATED);
    }

    public function loginAfterRegister($user_id,$request){
        Auth::loginUsingId($user_id);

            /** @var User */
            $auth_user = Auth::user();
            $auth_user->load('roles');

            # Guarda al usuario autenticado.
            $request->session()->put('user', $auth_user);

            # Solo solicita los datos, siempre y cuando el usuario sea un postulante.
            //if (!$user->isWorker())
            //    return;

            # Carga otros datos que requiere el modelo.
            $auth_user->load(['academicAreas', 'academicEntities']);

            # Busca a los postulantes.
            $appliants = User::with(['latestArchive.intentionLetters:archive_intention_letter.user_id,archive_intention_letter.user_type'])
                ->hasArchive()
                ->appliant()
                ->pluck('id');

            # Busca a los profesores en el sistema.
            $professors = User::role(['profesor_nb','admin','control_escolar','personal_apoyo'])->pluck('id');
            
            # Fusiona a los usuarios.
            $users = $professors->merge($appliants)->toArray();

            # Consulta a los usuarios.
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
