<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppliantArchive\ArchiveResource;

use App\Models\{
    AcademicProgram,
    Announcement,
    Archive,
    ArchiveRequiredDocument,
    EnvironmentRelatedSkills,
    IntentionLetter,
    User,
    RequiredDocument,
};

use Illuminate\Http\{
    JsonResponse,
    Request,
};

use Illuminate\Support\Facades\{
    Auth,
    DB,
    Mail,
};

use App\Helpers\MiPortalService;
use App\Mail\SendRejectPostulation;
use App\Mail\SendUpdateDocuments;

use Spatie\QueryBuilder\{
    AllowedFilter,
    QueryBuilder
};

class ArchiveController extends Controller
{
    /**
     * Web service de Mi portal.
     * 
     * @var \App\Helpers\MiPortalService
     */
    private $service;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->service = new MiPortalService;
        parent::__construct();
    }

    /* -------------------------- DASHBOARD DEL APLICANTE --------------------------*/
    public function compareStringToFieldList($list, $field, $stringToCompare)
    {
        $res = false;
        foreach ($list as $item) {
            if (strcmp($item, $stringToCompare) == 0) {
                $res = true;
                break;
            }
        }
        return $res;
    }

    public function index(Request $request)
    {
        $isProfessor = false;
        $announcements = Announcement::idDescending()->get();

        foreach ($announcements as $announcement) {
            $academic_program = AcademicProgram::where('id', $announcement->academic_program_id)->first();
            $announcement->setAttribute('name', $academic_program->name);
        }

        foreach ($request->session()->get('user')->roles as $rol) {
            if (strcmp($rol->name, 'profesor_colaborador') == 0 || strcmp($rol->name, 'profesor_nb') == 0) {
                $isProfessor = true;
            }
        }

        $academic_programs = AcademicProgram::with('latestAnnouncement')->get();
        $academic_programs_to_pop = [];
        // Auth user is a professor
        if ($isProfessor) {
            // The professor only have one commite Assigned
            // If not have not have one show everything and the same case for more than 1
            // This could be change if more academic comittes will add in the future
            if (count($request->session()->get('user')->academicComittes) < 2 && count($request->session()->get('user')->academicComittes) > 0) {

                // Check the name of the academic program
                // this would change if more academic comittes join the system
                // change for a loop and conditionals if not a switch
                switch ($request->session()->get('user')->academicComittes[0]->name) {
                    case "IMaREC":
                        array_push($academic_programs_to_pop, 'Doctorado en ciencias ambientales');
                        array_push($academic_programs_to_pop, 'Maestría en ciencias ambientales');
                        array_push($academic_programs_to_pop, 'Maestría en ciencias ambientales, doble titulación');
                        break;
                    case "PMPCA":
                        array_push($academic_programs_to_pop, 'Maestría Interdisciplinaria en ciudades sostenibles');
                        break;
                }
            }

            // pop the original list
            // search if each academic program is in the list
            foreach ($academic_programs as $apKey => $ap) {
                // if the item is in the list delete
                if ($this->compareStringToFieldList($academic_programs_to_pop, 'name', $ap->name) == true) {
                    // remove element from list
                    unset($academic_programs[$apKey]);
                }
            }
        }


        return view('postulacion.index')
            ->with('user', $request->user())
            ->with('academic_programs', $academic_programs)
            ->with('announcements', $announcements);
    }

    /* -------------------------- ADMIN VIEW FUNCTIONS --------------------------*/

    public function archivesProfessor(Request $request)
    {
        try {
            $archives = QueryBuilder::for(Archive::class)
                ->with('appliant')
                ->allowedIncludes(['announcement'])
                ->allowedFilters([
                    AllowedFilter::exact('announcement.id'),
                ])
                ->get();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => "No existen archivos para las fechas y modalidad indicada"], 502);
        }

        foreach ($archives as $k => $archive) {

            try {
                $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->appliant->id])->collect();
            } catch (\Exception $e) {
                return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
            }

            if (sizeof($user_data_collect) > 0) {

                //ArchiveResource create $user_data_collect[0];
                $user_data = $user_data_collect[0];
                //Se guarda el nombre del usuario en el modelo
                // $archive->appliant->setAttribute('name', $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname']);
                $archive->appliant->setAttribute('name', $user_data['name']);
                // Filtrao de nombres
                if (!str_contains($archive->appliant->name,  $user_data['middlename']) || !str_contains($archive->appliant->name,  $user_data['surname'])) {
                    $archive->appliant->name = $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname'];
                }

                // if ($user_data['id'] == 298428 || $user_data['id'] == 245241 || $user_data['id']  == 291395 || $user_data['id']  == 241294  || $user_data['id']  == 246441) {
                //     unset($archives[$k]);
                // }
            } else {
                //No existe aplicante por lo que no se podra ver expediente
                $archive->appliant->setAttribute('name', 'Usuario invalido');
                $archive->id = -1;

                //Elimina al usuario invalido de la lista
                unset($archives[$k]);
            }
        }

        return ArchiveResource::collection($archives);
    }

    public function archives(Request $request)
    {
        try {
            $archives =  Archive::with('appliant')->where('announcement_id', $request->announcement_id)->get();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => "No existen archivos para las fechas y modalidad indicada"], 502);
        }

        //Comprobar que todos los modelos de appliant tengan la información necesaria
        //Caso contrario insertar información en modelos

        foreach ($archives as $k => $archive) {
            //El postulante no tiene toda la información
            // if (!$archive->appliant->name) {

            try {
                $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->appliant->id])->collect();
            } catch (\Exception $e) {
                return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
            }

            if (sizeof($user_data_collect) > 0) {

                //ArchiveResource create $user_data_collect[0];
                $user_data = $user_data_collect[0];
                //Se guarda el nombre del usuario en el modelo
                // $archive->appliant->setAttribute('name', $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname']);
                // Filtrao de nombres


                // Contiene mas que el middlename
                // Puede repetirse el middlename e incluir el surname
                if ($archive->appliant->name != NULL) {
                    // $name = explode(' ', $archive->appliant->name);
                    // $archive->appliant->setAttribute('name', $user_data['name'] );
                    // $archive->appliant->name = $user_data['name'] . ' ' . $name[0] . ' ' . $name[sizeof($name)-1];
                } else {
                    // $archive->appliant->setAttribute('name', $middlename[0] . ' - ' . count($middlename));
                    // $archive->appliant->setAttribute('name',$archive->appliant->name);
                    $archive->appliant->setAttribute('name', $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname']);
                }

                // if (!str_contains(strval($user_data['name']),  strval($user_data['middlename'])) || !str_contains(strval($user_data['name']), strval($user_data['surname']))) {
                //     $archive->appliant->setAttribute('name', $user_data['middlename']);
                // } else {
                //     $archive->appliant->setAttribute('name', $user_data['name']);
                // }
            } else {
                //No existe aplicante por lo que no se podra ver expediente
                $archive->appliant->setAttribute('name', 'Usuario invalido');
                $archive->id = -1;

                //Elimina al usuario invalido de la lista
                unset($archives[$k]);
            }
            // }
        }
        // return new JsonResponse($archives, 200); //Ver info archivos en consola
        return ArchiveResource::collection($archives);
    }

    public function whoModifyArchive(Request $request)
    {

        try {
            $request->validate([
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al extraer y modificar el estado del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        try {
            $update = Archive::where('id', $request->archive_id)->update(['who_check' => $request->session()->get('user_data')['id']]);

            if ($update <= 0) {
                return new JsonResponse(['message' => 'No se pudo actualizar el estado del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al extraer y modificar el estado del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
    }

    public function updateStatusArchive(Request $request)
    {
        try {
            $request->validate([
                'archive_id' => ['required', 'numeric'],
                'status' => ['required', 'numeric']
            ]);

            $update = Archive::where('id', $request->archive_id)->update(['status' => $request->status]);

            if ($update <= 0) {
                return new JsonResponse(['message' => 'No se pudo actualizar el estado del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al extraer y modificar el estado del expediente'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        return new JsonResponse(['message' => 'El estado del expediente ha sido modificado'], JsonResponse::HTTP_ACCEPTED);
    }

    public function sentEmailToUpdateDocuments(Request $request)
    {
        try {
            $request->validate([
                'selected_personalDocuments.*' =>   ['required', 'numeric', 'exists:required_documents,id'],
                'selected_entranceDocuments.*' =>   ['required', 'numeric', 'exists:required_documents,id'],
                'selected_academicDocuments.*' =>   ['required'],
                'selected_languageDocuments.*' =>   ['required'],
                'selected_workingDocuments.*'  =>   ['required'],
                'instructions' => ['required', 'nullable', 'string', 'max:225'],
                'academic_program' => ['required'],
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'user_id' => ['required', 'numeric', 'exists:users,id']
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error de validacion'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        $appliant = null;
        $url_LogoAA = asset('/storage/headers/logod.png');
        $url_ContactoAA = asset('/storage/logos/rtic.png');

        try {
            $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $request->user_id])->collect();

            if (sizeof($user_data_collect) > 0) {
                $appliant = $user_data_collect[0];
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'El usuario no existe'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        // return new JsonResponse($appliant['email'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        try {
            // Encuentra el nombre de cada documento
            $name_documents = [];
            if (sizeof($request->selected_personalDocuments) > 0) {
                foreach ($request->selected_personalDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id)->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }
            if (sizeof($request->selected_entranceDocuments) > 0) {
                foreach ($request->selected_entranceDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id)->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }


            if (sizeof($request->selected_academicDocuments) > 0) {
                foreach ($request->selected_academicDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }

            if (sizeof($request->selected_languageDocuments) > 0) {
                foreach ($request->selected_languageDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }

            if (sizeof($request->selected_workingDocuments) > 0) {
                foreach ($request->selected_workingDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }



        try {
            // Mail::to("ulises.uudp@gmail.com")->send(new SendUpdateDocuments(
            $servicio_correo = 'smtp';
            if ($request->academic_program != null) {

                // IMAREC
                if (strcmp($request->academic_program['alias'], 'imarec') === 0) {
                    $servicio_correo = 'smtp_imarec';
                    $url_ContactoAA = asset('/storage/logos/IMAREC.png');
                } else {
                    // MCA, MCA doble titulacion, Doctorado
                    $servicio_correo = 'smtp_pmpca';
                    $url_ContactoAA = asset('/storage/logos/PMPCA.png');
                }
                Mail::mailer($servicio_correo)->to('ulises.uudp@gmail.com')->send(new SendUpdateDocuments(
                    // Mail::mailer($servicio_correo)->to($appliant['email'])->send(new SendUpdateDocuments(
                    $request->selected_personalDocuments,
                    $request->selected_entranceDocuments,
                    $request->selected_academicDocuments,
                    $request->selected_languageDocuments,
                    $request->selected_workingDocuments,
                    $name_documents,
                    $request->instructions,
                    $appliant,
                    $request->academic_program,
                    $request->archive_id,
                    $url_LogoAA,
                    $url_ContactoAA
                ));
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        return new JsonResponse(['message' => 'Exito'], JsonResponse::HTTP_ACCEPTED);
    }

    public function sentEmailRechazadoPostulacion(Request $request)
    {
        try {
            $request->validate([
                'selected_personalDocuments.*' =>   ['nullable', 'required', 'numeric', 'exists:required_documents,id'],
                'selected_entranceDocuments.*' =>   ['nullable', 'required', 'numeric', 'exists:required_documents,id'],
                'selected_academicDocuments.*' =>   ['nullable', 'required'],
                'selected_languageDocuments.*' =>   ['nullable', 'required'],
                'selected_workingDocuments.*'  =>   ['nullable', 'required'],
                'instructions' => ['required', 'nullable', 'string', 'max:225'],
                'academic_program' => ['required'],
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'user_id' => ['required', 'numeric', 'exists:users,id']
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error validacion', 'error' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }

        $appliant = null;
        $url_LogoAA = asset('/storage/headers/logod.png');
        $url_ContactoAA = asset('/storage/logos/rtic.png');

        try {
            $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $request->user_id])->collect();

            if (sizeof($user_data_collect) > 0) {
                $appliant = $user_data_collect[0];
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'El usuario no existe', 'error' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        try {
            $archive = Archive::where('id', $request->archive_id)->update(['comments' => $request->instructions]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'El expediente no puede ser actualizado', 'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        // return new JsonResponse($appliant['email'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);

        try {
            // Encuentra el nombre de cada documento
            $name_documents = [];
            if (sizeof($request->selected_personalDocuments) > 0) {
                foreach ($request->selected_personalDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id)->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }
            if (sizeof($request->selected_entranceDocuments) > 0) {
                foreach ($request->selected_entranceDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id)->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }


            if (sizeof($request->selected_academicDocuments) > 0) {
                foreach ($request->selected_academicDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }

            if (sizeof($request->selected_languageDocuments) > 0) {
                foreach ($request->selected_languageDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }

            if (sizeof($request->selected_workingDocuments) > 0) {
                foreach ($request->selected_workingDocuments as $doc_id) {
                    $doc = RequiredDocument::where('id', $doc_id[1])->first();
                    if ($doc != null) {
                        array_push($name_documents, $doc->name);
                    }
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], JsonResponse::HTTP_BAD_GATEWAY);
        }


        try {
            $servicio_correo = 'smtp';
            if ($request->academic_program != null) {
                // Email service
                // IMAREC
                if (strcmp($request->academic_program['alias'], 'imarec') === 0) {
                    $servicio_correo = 'smtp_imarec';
                    $url_LogoAA = asset('/storage/headers/IMAREC.png');
                } else {
                    // MCA, MCA doble titulacion, Doctorado
                    $servicio_correo = 'smtp_pmpca';
                    $url_LogoAA = asset('/storage/headers/PMPCA.png');
                }

                // CC Mail
                $mail_academic_program = 'rtic.ambiental@uaslp.mx';

                switch ($servicio_correo) {
                    case 'smtp_imarec':
                        $mail_academic_program =    'imarec.escolar@uaslp.mx';
                        break;
                    case 'smtp_pmpca':
                        $mail_academic_program =   'pmpca@uaslp.mx';
                        break;
                    default:
                        $mail_academic_program =   'rtic.ambiental@uaslp.mx';
                        break;
                }

                // Mail::mailer($servicio_correo)->to('ulises.uudp@gmail.com')->send(new SendRejectPostulation(

                Mail::mailer($servicio_correo)->to($appliant['email'])
                    ->cc($mail_academic_program)
                    ->send(new SendRejectPostulation(
                        $request->selected_personalDocuments,
                        $request->selected_entranceDocuments,
                        $request->selected_academicDocuments,
                        $request->selected_languageDocuments,
                        $request->selected_workingDocuments,
                        $name_documents,
                        $request->instructions,
                        $appliant,
                        $request->academic_program,
                        $request->archive_id,
                        $url_LogoAA,
                        $url_ContactoAA
                    ));
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo enviar el correo', 'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        return new JsonResponse(['message' => 'Exito'], JsonResponse::HTTP_ACCEPTED);
    }


    public function getDataFromPortalUser($appliant)
    {
        #Search user in portal
        $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $appliant->id])->collect();

        #Save only the first user that the portal get reach

        $user_data = $user_data_collect[0];

        #Add data of user from portal to the collection in controlescolar
        $appliant->setAttribute('name', $user_data['name']);
        $appliant->setAttribute('middlename', $user_data['middlename']);
        $appliant->setAttribute('surname', $user_data['surname']);
        $appliant->setAttribute('gender', $user_data['gender']);
        $appliant->setAttribute('birth_date', $user_data['birth_date']);
        $appliant->setAttribute('curp', $user_data['curp']);
        $appliant->setAttribute('age', $user_data['age']);
        $appliant->setAttribute('birth_country', $user_data['nationality']);
        $appliant->setAttribute('residence_country', $user_data['residence']);
        $appliant->setAttribute('phone_number', $user_data['phone_number']);
        $appliant->setAttribute('email', $user_data['email']);
        $appliant->setAttribute('altern_email', $user_data['altern_email']);
        $appliant->setAttribute('academic_degree', $user_data['academic_degree']);

        return $appliant;
    }

    /* -------------------------- APPLIANT  --------------------------*/

    public function showRegisterArchives(Request $request)
    {
        //Obtiene los archivos para el programa academico a registrarse

        $archives = Archive::where('user_id', $request->session()->get('user_data')['id'])->get();

        // El usuario tiene mas de un expediente
        if (count($archives) > 1) {

            foreach ($archives as $archive) {
                $archive->loadMissing([
                    'appliant',
                    'announcement.academicProgram',
                ]);

                $academic_program = $archive->announcement->academicProgram;

                // get the image for the corresponding academic program
                $img = 'DOCTORADO-SUPERIOR.png';
                switch ($academic_program->name) {
                    case 'Maestría en ciencias ambientales':
                        $img = 'PMPCA-SUPERIOR.png';
                        break;
                    case 'Maestría en ciencias ambientales, doble titulación':
                        $img = 'ENREM-SUPERIOR.png';
                        break;
                    case 'Maestría Interdisciplinaria en ciudades sostenibles':
                        $img = 'IMAREC-SUPERIOR.png';
                        break;
                    case 'Doctorado en ciencias ambientales':
                        $img = 'DOCTORADO-SUPERIOR.png';
                        break;
                    default:
                        $img = 'DOCTORADO-SUPERIOR.png';
                        break;
                }
                $header_academic_program = asset('storage/headers/' . $img);

                $archive->setAttribute('header_academic_program', $header_academic_program);
            }
            return view('postulacion.showRegisterArchives')->with('archives', $archives);

            // El estudiante solamente tiene un archivo
        }


        return $this->appliantArchive($request, $archives[0]->id);
        // No existe nada
        return back();
    }

    public function showCreateNewArchive(Request $request)
    {
        $academic_programs_student = DB::table('academic_programs as ap')
            ->rightJoin('announcements as ann', 'ann.academic_program_id', '=', 'ap.id')
            ->rightJoin('archives as a', 'ann.id', '=', 'a.announcement_id')
            ->where('a.user_id', '=', $request->session()->get('user_data')['id'])
            ->select('ap.id')
            ->get();


        $academic_programs_student_ids = [];
        foreach ($academic_programs_student as $aps) {
            array_push($academic_programs_student_ids, $aps->id);
        }

        $academic_programs_to_apply = AcademicProgram::whereNotIn('id', $academic_programs_student_ids)->with('latestAnnouncement')->get();

        return view('postulacion.newArchive')
            ->with('academic_programs', $academic_programs_to_apply);
    }

    public function createArchive(Request $request)
    {
        $request->validate([
            'academic_program_id' => ['required', 'numeric', 'exists:academic_programs,id'],
        ]);

        try {
            // Found the academic program and the latest Announcement to register the archive 
            $academicProgram = AcademicProgram::where('id', $request->academic_program_id)->with('latestAnnouncement')->first();
            $user = User::where('id', $request->session()->get('user_data')['id'])->first();

            # ------------- Genera el expediente del postulante.
            $user->archives()->create([
                'user_type' =>  $user->type,
                'announcement_id' => $academicProgram->latestAnnouncement->id,
                'status' => 0,
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo crear el archivo para el postulante', 'error' => $e], 400);
        }


        # --------------------- Respuesta de éxito.
        return new JsonResponse(['message' => 'Éxito'], JsonResponse::HTTP_CREATED);
    }

    public function uploadDataIfEmptyForEnrem($archiveModel, $archive_id)
    {
        try {
            $archiveModel->loadMissing([
                'enviromentRelatedSkills',
            ]);
    
            if(sizeof($archiveModel->enviromentRelatedSkills) < 1){
                $archiveModel->enviromentRelatedSkills()->createMany([
                    [
                        'message_review' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de enviromentRelatedSkills', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // Reasons to choise

        try {
            $archiveModel->loadMissing([
                'reasonsToChoise',
            ]);
    
            if(sizeof($archiveModel->reasonsToChoise) < 1){
                $archiveModel->reasonsToChoise()->createMany([
                    [
                        'first_choise' => null,                  
                        'reasons_choise' => null,
                        'others_choises' => null,
                        'selected_choises' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de reasonsToChoise', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        
        try {
            $archiveModel->loadMissing([
                'address',
            ]);
    
            if(sizeof($archiveModel->address) < 1){
                // Permanent Address
                $archiveModel->address()->createMany([
                    [
                        'care_of' => null,            
                        'street' => null,
                        'number_address' => null,
                        'city' => null,
                        'postal_code' => null,
                        'state_country'=> null,
                        'telephone' => null,
                        'mobile_phone' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    

                // Current Address
                $archiveModel->address()->createMany([
                    [
                        'care_of' => null,            
                        'street' => null,
                        'number_address' => null,
                        'city' => null,
                        'postal_code' => null,
                        'state_country'=> null,
                        'telephone' => null,
                        'mobile_phone' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de address', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // Secondary education

        try {
            $archiveModel->loadMissing([
                'secondaryEducation',
            ]);
    
            if(sizeof($archiveModel->secondaryEducation) < 1){
                $archiveModel->secondaryEducation()->createMany([
                    [
                        'school_certificade' => null,                  
                        'final_score' => null,
                        'name_of_institution' => null,
                        'from' => null,
                        'to' => null,                  
                        'city_country' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de secondaryEducation', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // future plans
        try {
            $archiveModel->loadMissing([
                'futurePlans',
            ]);
    
            if(sizeof($archiveModel->futurePlans) < 1){
                $archiveModel->futurePlans()->createMany([
                    [
                        'explain_pursue_future' => null,                  
                        'pursue_future' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de secondaryEducation', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // fields of interest
        try {
            $archiveModel->loadMissing([
                'fieldsOfInterest',
            ]);
    
            if(sizeof($archiveModel->fieldsOfInterest) < 1){
                $archiveModel->fieldsOfInterest()->createMany([
                    [
                        'research_area_mexico' => null,                  
                        'research_area_german' => null,
                        'professor_research_mexico' => null,                  
                        'professor_research_german' => null,
                        'elective_modules_PMPCA_german' => null,            
                        'elective_modules_PMPCA_mexico' => null,                        
                        'elective_modules_ITT_german' => null,
                        'elective_modules_ITT_mexico' => null,
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de fieldsOfInterest', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        // financing studies
        try {
            $archiveModel->loadMissing([
                'financingStudies',
            ]);
    
            if(sizeof($archiveModel->financingStudies) < 1){
                $archiveModel->financingStudies()->createMany([
                    [
                        'financing_options' => null,                  
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de financingStudies', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // financing studies
        try {
            $archiveModel->loadMissing([
                'recommendationLetterEnrem',
            ]);
    
            if(sizeof($archiveModel->recommendationLetterEnrem) < 1){
                $archiveModel->recommendationLetterEnrem()->createMany([
                    [
                        'type' => null, 
                        'date' => null,  
                        'title' => null,   
                        'position' => null,  
                        'organization' => null,
                        'telephone' => null,     
                        'full_name' => null,       
                        'email' => null,                          
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de recommendationLetterENREM', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        // financing studies
        try {
            $archiveModel->loadMissing([
                'hearAboutProgram',
            ]);
    
            if(sizeof($archiveModel->hearAboutProgram) < 1){
                $archiveModel->hearAboutProgram()->createMany([
                    [
                        'how_hear' => null,             
                        'archive_id' => $archive_id
                    ]
                ]);    
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede extraer la información de HearAboutProgram', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // enrem documents
        try{
            $archiveModel->loadMissing([
                'enremDocuments',
            ]);
    
            if(sizeof($archiveModel->enremDocuments) < 1){
                $enrem_documents_id = RequiredDocument::where('type', 'enrem')->pluck('id');
                $archiveModel->enremDocuments()->attach($enrem_documents_id);
            }

        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'La relacion a los documentos de enrem no existe', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
    }

    public function appliantArchive(Request $request, $archive_id)
    {

        try {
            $archiveModel = Archive::where('id', $archive_id)->first();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'El archivo con el ID ', 'error' => $e], JsonResponse::HTTP_BAD_REQUEST);
        }

        if ($archiveModel == null) {
            return '<h1>No existe expediente para el postulante</h1>';
        }

        // ENREM add if NOT
        // EnvironmentRelatedSkills
        $this->uploadDataIfEmptyForEnrem($archiveModel,$archive_id);

        try {
            $archiveModel->loadMissing([
                // Cosas del aplicante
                'appliant',
                'announcement.academicProgram',
                // Documentos y secciones para expedinte
                'personalDocuments',
                'requiredDocuments',
                'curricularDocuments',
                'entranceDocuments',
                'intentionLetter',
                'recommendationLetter',
                'myRecommendationLetter',
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
                'appliantWorkingExperiences',
                'scientificProductions.authors',
                'interviewDocuments',
                'humanCapitals',
                
                'enviromentRelatedSkills',
                'reasonsToChoise',
                'address',
                'secondaryEducation',
                'futurePlans',
                'fieldsOfInterest',
                'financingStudies',
                'recommendationLetterEnrem',
                'hearAboutProgram',
                'enremDocuments',
            ]);
            // dd($archiveModel);
            $academic_program = $archiveModel->announcement->academicProgram;

            // * Complete appliant information
            $appliant = $this->getDataFromPortalUser($archiveModel->appliant);


            // get the image for the corresponding academic program
            $img = 'DOCTORADO-SUPERIOR.png';
            switch ($academic_program->name) {
                case 'Maestría en ciencias ambientales':
                    $img = 'PMPCA-SUPERIOR.png';
                    break;
                case 'Maestría en ciencias ambientales, doble titulación':
                    $img = 'ENREM-SUPERIOR.png';
                    break;
                case 'Maestría Interdisciplinaria en ciudades sostenibles':
                    $img = 'IMAREC-SUPERIOR.png';
                    break;
                case 'Doctorado en ciencias ambientales':
                    $img = 'DOCTORADO-SUPERIOR.png';
                    break;
                default:
                    $img = 'DOCTORADO-SUPERIOR.png';
                    break;
            }
            $header_academic_program = asset('storage/headers/' . $img);

            // Letters Commitment
            $location_letterCommitment_DCA =    asset('storage/DocumentoExtra/LetterCommitment/DCA.docx');
            $location_letterCommitment_MCA =    asset('storage/DocumentoExtra/LetterCommitment/MCA.docx');
            $location_letterCommitment_IMaREC = asset('storage/DocumentoExtra/LetterCommitment/IMaREC.docx');
            $letters_Commitment = [];
            array_push($letters_Commitment, $location_letterCommitment_MCA);    // [0] Maestria en ciencias ambientales, normal y doble titulacion
            array_push($letters_Commitment, $location_letterCommitment_DCA);    // [1] Doctorado en ciencias
            array_push($letters_Commitment, $location_letterCommitment_IMaREC); // [2]  ciudades sosteniles

        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo', 'error' => $e], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        // dd( $request->session()->get('user')->id);
        // dd( $archiveModel);

        return view('postulacion.show')
            ->with('archive', $archiveModel)
            ->with('appliant', $appliant)
            ->with('academic_program', $academic_program)
            ->with('recommendation_letters', $archiveModel->myRecommendationLetter)
            ->with('archives_recommendation_letters', $archiveModel->recommendationLetter)
            ->with('header_academic_program', $header_academic_program)
            ->with('letters_Commitment', $letters_Commitment)
            ->with('viewer', $request->session()->get('user'));
    }

    public function updateMotivation(Request $request)
    {
        Archive::where('id', $request->archive_id)->update(['motivation' => $request->motivation]);

        return new JsonResponse(
            Archive::select('motivation')->firstWhere('id', $request->archive_id)
        );
    }

    public function updateExanniScore(Request $request)
    {
        $request->validate([
            'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            'exanni_score' => ['required', 'numeric',],
        ]);

        Archive::where('id', $request->archive_id)->update(['exanni_score' => $request->exanni_score]);

        return new JsonResponse(
            Archive::select('exanni_score')->firstWhere('id', $request->archive_id)
        );
    }

    public function showDocumentsFromEmail(Request $request, $archive_id, $personal_documents, $entrance_documents, $academic_documents, $language_documents, $working_documents)
    {

        try {
            $personal_documents_ids = json_decode($personal_documents);
            $entrance_documents_ids = json_decode($entrance_documents);
            $academic_documents_ids = json_decode($academic_documents);
            $language_documents_ids = json_decode($language_documents);
            $working_documents_ids  = json_decode($working_documents);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo decodificar todo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        try {
            if ($archive_id != null) {
                $archive = Archive::where('id', intval($archive_id))->first();
                //Carga modelos de archivo
                $archive->loadMissing([
                    'appliant',
                    'announcement.academicProgram',
                    'personalDocuments',
                    'recommendationLetter',
                    'myRecommendationLetter',
                    'entranceDocuments',
                    'intentionLetter',
                    'academicDegrees.requiredDocuments',
                    'appliantLanguages.requiredDocuments',
                    'appliantWorkingExperiences',
                    'scientificProductions.authors',
                    'humanCapitals'

                ]);
                $academic_program = $archive->announcement->academicProgram;
                $appliant = $archive->appliant;
                // get the image for the corresponding academic program
                $img = 'DOCTORADO-SUPERIOR.png';
                switch ($academic_program->name) {
                    case 'Maestría en ciencias ambientales':
                        $img = 'PMPCA-SUPERIOR.png';
                        break;
                    case 'Maestría en ciencias ambientales, doble titulación':
                        $img = 'ENREM-SUPERIOR.png';
                        break;
                    case 'Maestría Interdisciplinaria en ciudades sostenibles':
                        $img = 'IMAREC-SUPERIOR.png';
                        break;
                    case 'Doctorado en ciencias ambientales':
                        $img = 'DOCTORADO-SUPERIOR.png';
                        break;
                    default:
                        $img = 'DOCTORADO-SUPERIOR.png';
                        break;
                }
                $header_academic_program = asset('storage/headers/' . $img);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        // Auth the user
        Auth::loginUsingId($appliant->id);


        return view('postulacion.showUpdateDocuments')
            ->with('archive', $archive)
            ->with('appliant', $appliant)
            ->with('academic_program', $academic_program)
            ->with('header_academic_program', $header_academic_program)
            ->with('personal_documents_ids', $personal_documents_ids)
            ->with('entrance_documents_ids', $entrance_documents_ids)
            ->with('academic_documents_ids', $academic_documents_ids)
            ->with('language_documents_ids', $language_documents_ids)
            ->with('working_documents_ids', $working_documents_ids);
    }


    /*---------------------------------------- PERSONAL DOCUMENTS  ---------------------------------------- */

    public function getPersonalRequiredDocuments(Request $request)
    {
        try {
            $archive = Archive::find($request->archive_id);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al buscar archivo'], 200);
        }


        // archive model
        try {
            $archive->loadMissing([
                'personalDocuments',
                'appliant',
            ]);

            $appliant = $this->getDataFromPortalUser($archive->appliant);
            $personal_documents = [];
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }

        try {
            if (strcmp($appliant->birth_country, 'México') != 0) {
                // if (strcmp($request->session()->get('user_data')['nationality'], 'México') != 0) {

                for ($i = 0; $i < count($archive->personalDocuments); $i++) {
                    if (strcmp($archive->personalDocuments[$i]->name, '2.- CURP expedido por la RENAPO') != 0 && strcmp($archive->personalDocuments[$i]->name, '3.- INE en ampliación tamaño carta') != 0) {
                        array_push($personal_documents, $archive->personalDocuments[$i]);
                    }
                }
            } else {
                for ($i = 0; $i < count($archive->personalDocuments); $i++) {
                    if (strcmp($archive->personalDocuments[$i]->name, '4.- Primera página del pasaporte') != 0) {
                        // unset($archive->personalDocuments[$i]);
                        array_push($personal_documents, $archive->personalDocuments[$i]);
                    }
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }

        return $personal_documents;
    }
    public function updateArchivePersonalDocument(Request $request)
    {
        $request->validate([
            'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            'requiredDocumentId' => ['required', 'numeric', 'exists:required_documents,id'],
            'file' => ['required']
        ]);

        try {
            $archive = Archive::find($request->archive_id);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al buscar archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        // Create the route
        try {
            # Archivo de la solicitud
            $ruta = $request->file('file')->storeAs(
                'archives/' . $request->archive_id . '/personalDocuments',
                $request->requiredDocumentId . '.pdf'
            );
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'La ruta no se puede generar'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        try {
            # Asocia los documentos requeridos.
            # Asocia los documentos requeridos.
            $archive->personalDocuments()->detach($request->requiredDocumentId);
            $archive->personalDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);
            $required_document = ArchiveRequiredDocument::where([
                'required_document_id' => $request->requiredDocumentId,
                'archive_id' => $request->archive_id
            ])->first();
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se puede generar la relacion'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        /**Problema al regresar el json, marca un erro en la consulta */
        return new JsonResponse(
            ['location' => $required_document->location],
            JsonResponse::HTTP_CREATED
        );
    }

    /*---------------------------------------- ENTRANCE DOCUMENTS  ---------------------------------------- */
    public function getEntranceRequiredDocuments(Request $request)
    {
        try {
            $archive = Archive::find($request->archive_id);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }

        $local_appliant = 0;
        try {
            $archive->loadMissing([
                'entranceDocuments',
                'academicDegrees.requiredDocuments',
            ]);
            for ($i = 0; $i < count($archive->academicDegrees); $i++) {

                if ($archive->academicDegrees[$i]->country != null) {

                    if (strcmp($archive->academicDegrees[$i]->country, 'México') != 0) {
                        $local_appliant = 1;
                    }
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }


        $entrance_documents = [];
        try {
            if ($local_appliant > 0) {
                for ($i = 0; $i < count($archive->entranceDocuments); $i++) {
                    if (strcmp($archive->entranceDocuments[$i]->name, '13.- Resultados del EXANI III vigente (no aplica a estudiantes extranjeros, comprobante de pago del examen si no tienen resultados o no lo han presentado)') != 0) {
                        array_push($entrance_documents, $archive->entranceDocuments[$i]);
                    }
                }
            } else {
                $entrance_documents = $archive->entranceDocuments;
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }

        $return_entrance_documents = [];
        // Elimina los repetidos
        try {

            for ($i = 0; $i < count($entrance_documents); $i++) {
                $repeat = 0;
                for ($j = $i + 1; $j < count($entrance_documents); $j++) {
                    if (strcmp($entrance_documents[$i]->name, $entrance_documents[$j]->name) == 0) {
                        $repeat = 1;
                    }
                }
                if ($repeat <= 0) {
                    array_push($return_entrance_documents, $entrance_documents[$i]);
                }
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 200);
        }

        return $return_entrance_documents;
    }

    public function getExanniScore(Request $request)
    {
        try {
            $archive = Archive::find($request->archive_id);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        return $archive->exanni_score;
    }

    public function updateArchiveEntranceDocument(Request $request)
    {

        $request->validate([
            'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            'requiredDocumentId' => ['required', 'numeric', 'exists:required_documents,id'],
            'file' => ['required']
        ]);

        try {
            $archive = Archive::find($request->archive_id);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al buscar archivo'], JsonResponse::HTTP_CONFLICT);
        }


        // Create the route
        try {
            # Archivo de la solicitud
            $ruta = $request->file('file')->storeAs(
                'archives/' . $request->archive_id . '/entranceDocuments',
                $request->requiredDocumentId . '.pdf'
            );
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'La ruta no se puede generar'], JsonResponse::HTTP_BAD_REQUEST);
        }


        try {
            # Asocia los documentos requeridos.
            $archive->entranceDocuments()->detach($request->requiredDocumentId);
            $archive->entranceDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);
            $required_document = ArchiveRequiredDocument::where([
                'required_document_id' => $request->requiredDocumentId,
                'archive_id' => $request->archive_id
            ])->first();
        } catch (\Exception $e) {
            return new JsonResponse(['information' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        // Agregar relacion si es carta de intención
        try {
            $documento_requerido = RequiredDocument::where('id', $request->requiredDocumentId)->first();
            if ($required_document != null && $documento_requerido != null && strcmp($documento_requerido->name, '12.- Carta de intención de un profesor del núcleo básico (el profesor la envía directamente)') === 0) {
                $intention_letter = IntentionLetter::where('archive_required_document_id', $required_document->id)->get();

                if ($intention_letter != null) {
                    $isDelete = IntentionLetter::where('archive_required_document_id', $required_document->id)->delete();
                }

                $intention_letter = IntentionLetter::create([
                    'archive_required_document_id' => $required_document->id,
                    'user_id' => $request->session()->get('user_data')['id'],
                    'user_type' => $request->session()->get('user_data')['user_type'],
                ]);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }


        /**Problema al regresar el json, marca un erro en la consulta */
        return new JsonResponse(
            ['location' => $ruta],
            JsonResponse::HTTP_OK
        );
    }
}
