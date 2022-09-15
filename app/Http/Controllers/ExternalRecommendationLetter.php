<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecommendationLetter;
use App\Mail\SendRecommendationLetter;
use Illuminate\Support\Facades\{
    DB,
    Mail,
};
use Illuminate\Http\{
    JsonResponse,
};
use App\Models\{
    Archive,
    ArchiveRequiredDocument,
    CustomParameter,
    MyRecommendationLetter,
    Parameter,
    User,
    RecommendationLetter,
    RequiredDocument,
    ScoreParameter,
};
use Barryvdh\DomPDF\Facade\Pdf;
use Nette\Utils\Json;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;
use App\Services\PayUService\Exception;
use DateTime;

class ExternalRecommendationLetter extends Controller
{

    /**
     * Web service de Mi portal.
     * 
     * @var \App\Helpers\MiPortalService
     */
    private $service;

    public function __construct()
    {
        $this->service = new MiPortalService;
        parent::__construct();
    }

     /* -------------------------- CARTA DE RECOMENDACION DEL APLICANTE --------------------------*/
     public function sentEmailRecommendationLetter(Request $request)
     {
 
         // Variables locales
         $message = 'Exito, el correo ha sido enviado'; // Mensaje de retorno
         $my_token = Str::random(20);    //Token para identificar carta recomendacion
 
         //validacion de datos
         $request->validate([
             'email' => ['required', 'email', 'max:255'],
             'academic_program' => ['required'],
             'appliant' => ['required'],
             'letter_created' => ['required'],
             'recommendation_letter' => ['required_if:letter_created,1'] // ya existe carta por lo tanto es requerido
         ]);
 
         #Se envia correo si todo salio correcto
         if ($request->letter_created == 1) { //cambia string ya que existe carta de recomendacion
             $my_token = $request->recommendation_letter['token'];
             //return json response
         }
 
         //Imgs to put in the email
         $url_LogoAA = asset('/storage/headers/logod.png');
         $url_ContactoAA = asset('/storage/logos/rtic.png');
 
         try {
             //Email enviado
             Mail::to($request->email)->send(new SendRecommendationLetter($request->email, $request->appliant, $request->academic_program, $my_token, $url_LogoAA, $url_ContactoAA));
         } catch (\Exception $e) {
             return new JsonResponse(['message' => $e->getMessage()] , 200);
         }
 
 
         //Se busca el archivo por el USER ID
         $archive = Archive::where('user_id', $request->appliant['id'])->first();
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
 
         # Cartas de recomendacion en expediente
         $num_recommendation_letter_count = $archive->archiveRequiredDocuments()
             ->whereNotNull('location')
             ->whereIsRecommendationLetter()
             ->count();
 
         #Se verifica el numero de cartas de recomendacion ya enviadas por archivo de solicitante
         if ($num_recommendation_letter_count > 2) {
             return new JsonResponse(['message' =>  'Maximo numero de cartas contestadas, ya no se permiten mas respuestas']  , JsonResponse::HTTP_CONFLICT);
         }
 
         #Ids para relacion a archive required document table
         // $required_document_id  = ($num_recommendation_letter_count < 1) ? 19 : 20; //Maximo de dos cartas, por lo tanto sera solo (0,1)
         $required_document_id = 19;
 
         //Se verifica si ya existe un registro de Carta o se necesita crear
         if ($request->letter_created == 1) { //ya existe registro de carta
             $rlsCompare = $archive->myRecommendationLetter;
             foreach ($archive->myRecommendationLetter as $rl) {
 
                 #Se verifica que no exista el mismo correo para contestar la carta en otra
                 foreach ($rlsCompare as $rlCompare) {
                     //carta diferente
                     if ($rlCompare->id != $rl->id) {
                         if (strcmp($rlCompare->email_evaluator, $rl->email_evaluator) == 0) {
                             return new JsonResponse(['message' =>  'Correo existente, intente con uno diferente'] , JsonResponse::HTTP_BAD_REQUEST);
                         }
                     }
                 }
 
                 //checa si es el mismo id
                 if ($rl->id == $request->recommendation_letter['id']) {
 
                     //Si son  diferentes actualizar registro
                     if (strcmp($rl->email_evaluator, $request->email) != 0) {
                         $change_email = 1; // el email a cambiado
                         $rl->email_evaluator = $request->email;
                         $rl->save();
                         break;
                     }
                 }
             }
         } else { //no existe carta
 
             foreach ($archive->myRecommendationLetter as $rl) {
                 if (strcmp($rl->email_evaluator, $request->email) == 0) {
                     return new JsonResponse(['message' =>  'Correo registrado para otra carta, intente uno diferente'] , JsonResponse::HTTP_CONFLICT);
                 }
             }
 
             #SE REQUIERE CREAR CAMPOS EN TABLAS
             try {
                 $rl = MyRecommendationLetter::create([
                     'email_evaluator' => $request->email,
                     'archive_id' => $archive->id,
                     'token' => $my_token,  //random token to verify
                     'answer' => 0 //not answer
                 ]); //Ahora se espera la respuesta del evaluador
 
                 // Archivo requerido
                 $archive_rd = ArchiveRequiredDocument::create([
                     'archive_id' => $archive->id,
                     'required_document_id' => $required_document_id
                 ]);
 
                 // Carta de recomendacion (Relacion de carta a archivo requerido)
                 $archive_rl = RecommendationLetter::create([
                     'rl_id' => intval($rl->id),
                     'required_document_id' => intval($archive_rd->id),
                 ]);
             } catch (\Exception $e) {
                 return new JsonResponse( ['message' =>  'Error al crear la carta de recomendación comuniquese con Agenda Ambiental'], JsonResponse::HTTP_NO_CONTENT);
             }
         }
 
         return new JsonResponse(
             ['message' => $message],
             JsonResponse::HTTP_OK
         );
     }

    /**
     * Agrega la carta de recomendacion 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addRecommendationLetter(StoreRecommendationLetter $request)
    {

        $appliant = $request->appliant;
        $announcement = $request->announcement;
        $parameters = $request->score_parameters;
        $custom_parameters = $request->custom_parameters;
        $message = 'Exito';
        //existe o no registro de carta 

        #Extrae carta de DB
        try {
            $recommendation_letter = MyRecommendationLetter::where('token', $request->token)->first();
        } catch (\Exception $e) {
            return new JsonResponse(
                'no existe carta de recomendacion',
                200,
            );
        }
        $cosas = compact('recommendation_letter', 'appliant');


        # Verifica que la carta no se ha enviado del propio correo 
        // el correo coincide
        if (strcmp($recommendation_letter->email_evaluator, $request->email) != 0) {
            //token unico coincide
            if ($recommendation_letter->token == $request->token) {
                //no se ha respondido aun
                if ($recommendation_letter->answer <= 0) {

                    try {
                        //archivo de carta de recomendacion
                        $archive_rl = RecommendationLetter::where('rl_id', $recommendation_letter->id)->first();
                        //archivo requerido
                        $archive_required = ArchiveRequiredDocument::where('id', $archive_rl->required_document_id)->first();
                        //Expediente del estudiante
                        $archive = Archive::where('id', $archive_required->archive_id)->first();
                        // return new JsonResponse(
                        //     $archive,
                        //     200
                        // );
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
                    } catch (\Exception $e) {
                        return new JsonResponse(
                            'no se cargaron modelos de archivos',
                            200
                        );
                    }
                    #Se crea campos de parametros establecidos y customs
                    //Score parameters
                    try {
                        foreach ($request->score_parameters as $score) {

                            //busca el parametro
                            $parameter_found = Parameter::where('text', $score['name'])->first();

                            // return new JsonResponse(
                            //     $parameter_found,
                            //     200
                            // );
                            ScoreParameter::create([
                                'rl_id' => $recommendation_letter->id,
                                'parameter_id' => $parameter_found->id,
                                'score' => $score['score']
                            ]);
                        }
                    } catch (\Exception $e) {
                        return new JsonResponse(
                            $e->getMessage(),
                            200
                        );
                    }
                    //Custom parameter
                    try {
                        //Custom Parameters
                        foreach ($request->custom_parameters as $custom) {
                            CustomParameter::create([
                                'rl_id' => $recommendation_letter->id,
                                'text' => $custom['name'],
                                'score' => $custom['score']
                            ]);
                        }
                    } catch (\Exception $e) {
                        return new JsonResponse(
                            $e->getMessage(),
                            200
                        );
                    }

                    #Actualizar modelos
                    try {
                        //carta de recomendacion
                        $recommendation_letter->update($request->safe()->except(['score_parameters', 'custom_parameters', 'recommendation_letter_id', 'appliant', 'announcement']));

                        // archivo de carta de recomendacion
                        // $archive_rl =  RecommendationLetter::where('rl_id', $recommendation_letter->id)->first()->update([
                        //     'location' => $path,
                        //     // 'rl_id' => $recommendation_letter->id,
                        //     // 'required_document_id' => $archive_required->id,
                        // ]);


                        // //archivo requerido
                        // $archive_required->update(['location' => $path]);
                    } catch (\Exception $e) {
                        return new JsonResponse($e->getMessage(), 200);
                    }
                } else {
                    $message = 'Carta contestada';
                }
            } else {
                $message = 'Token invalido';
            }
        } else {
            $message = 'Correo invalido';
        }

        return new JsonResponse($message, 200);
    }

    /**
     * Envia la vista de carta de recomendación con los datos requeridos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //aqui solo recibira una cadena 
    //public function recommendationLetter(Request $request)
    /*
    request tendra

    token
    email evaluator
    answer (boleano numerico)
    */
    public function recommendationLetter(Request $request, $token)
    {

        #Busqueda de Carta de recomendacion y archivo
        try {
            //Busqueda de carta con token y correo 
            $rl = MyRecommendationLetter::where([
                ['token', $token],
            ])->first();
        } catch (\Exception $e) {
            return view('postulacion.recommendationLetter.errorNoAppliant')
                ->with('user_id', $request->token);
        }

        // Se extrae el archivo de postulacion
        $archive = Archive::where('id', $rl->archive_id)->first();

        #Carga de modelos en archivo
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


        #Verificacion de carta no contestada
        if ($rl->answer >= 1) {
            return view('postulacion.recommendationLetter.successLetterSent')
                ->with('user_id', $archive->appliant->id);
        }

        #Extraccion de variables necesarias
        try {
            // Extrae TODOS LOS PARAMETROS A EVALUAR
            $parameters = Parameter::all();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        // Cartas de recomendacion en expediente
        $num_recommendation_letter_count = $archive->archiveRequiredDocuments()
            ->whereNotNull('location')
            ->whereIsRecommendationLetter()
            ->count();
        $announcement = $archive->announcement;

        //Obtiene la informacion del aplicante 
        $appliant = $archive->appliant;

        //Peticion a portal
        try {
            #Peticion a portal (Busca usuario)
            $user_collection =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $appliant->id])->collect();
        } catch (\Exception $e) {
            return new JsonResponse('Peticion erronea', 502);
        }

        //Existe el postulante en el portal 
        if ($user_collection) {
            $user_data = $user_collection[0]; //Se retorno solo uno entonces se extrae informacion 
            //Add data portal to local collection USER
            $appliant->setAttribute('curp', $user_data['curp']);
            $appliant->setAttribute('name', $user_data['name']);
            $appliant->setAttribute('middlename', $user_data['middlename']);
            $appliant->setAttribute('surname', $user_data['surname']);
            $appliant->setAttribute('age', $user_data['age']);
            $appliant->setAttribute('gender', $user_data['gender']);
            $appliant->setAttribute('birth_country', $user_data['nationality']);
            $appliant->setAttribute('birth_state', $user_data['residence']);
            $appliant->setAttribute('residence_country', $user_data['residence']);
            $appliant->setAttribute('phone_number', $user_data['phone_number']);
            $appliant->setAttribute('email', $user_data['email']);
            $appliant->setAttribute('altern_email', $user_data['altern_email']);
            $appliant->setAttribute('academic_degree', $user_data['academic_degree']);
            /* Faltaria
                Academic degree
                // $appliant->setAttribute('academic_degree',$user_data['academic_degree']);
                Dependencia
                // $appliant->setAttribute('dependency',$user_data['dependency']);
            */
        }
        $academic_program = $archive->announcement->academicProgram;

        //Enviar los datos necesarios 
        return view('postulacion.recommendationLetter.show')
            ->with('recommendation_letter', $rl)
            ->with('appliant', $appliant)                   //usuario 
            ->with('announcement', $announcement)
            ->with('parameters', $parameters)
            ->with('token', $token); //programa academico
    }

    public function pruebaPDF(Request $request)
    {
        $user_id = 213321;
        // find the archive
        try {
            $archive = Archive::where('user_id', $user_id)->first();
            $archive->loadMissing([
                // Cosas del aplicante
                'appliant',
                'announcement.academicProgram',
                // Documentos y secciones para expedinte
                'requiredDocuments',
                'personalDocuments',
                'curricularDocuments',
                'entranceDocuments',
                'intentionLetter',
                'recommendationLetter',
                'myRecommendationLetter',
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
                'appliantWorkingExperiences',
                'scientificProductions.authors',
                'humanCapitals'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse('hola1', 200); //Ver info archivos en consola
        }

        // collect user data
        try {
            $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->appliant->id])->collect();
            if (sizeof($user_data_collect) > 0) {
                $user_data = $user_data_collect[0];
                //Se guarda el nombre del usuario en el modelo
                $archive->appliant->setAttribute('name', $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname']);
                $archive->appliant->setAttribute('birth_date', $user_data['birth_date']);
                $archive->appliant->setAttribute('curp', $user_data['curp']);
                $archive->appliant->setAttribute('age', $user_data['age']);
                $archive->appliant->setAttribute('gender', $user_data['gender']);
                $archive->appliant->setAttribute('birth_country', $user_data['nationality']);
                $archive->appliant->setAttribute('residence_country', $user_data['residence']);
                $archive->appliant->setAttribute('phone_number', $user_data['phone_number']);
                $archive->appliant->setAttribute('email', $user_data['email']);
                $archive->appliant->setAttribute('altern_email', $user_data['altern_email']);
                $archive->appliant->setAttribute('academic_degree', $user_data['academic_degree']);
            }
        } catch (\Exception $e) {
            return new JsonResponse('hola2', 400); //Ver info archivos en consola
        }

        // Set the date 
        try {
            $date_nums = explode("-", $archive->announcement->to);
            $announcement_date_msg = "Convocatoria Junio 2022";
            if (sizeof($date_nums) > 0) {
                $dateObj   = DateTime::createFromFormat('!m', $date_nums[1]);
                $month_announcement = $dateObj->format('F');
                $announcement_date_msg = "Convocatoria " . $month_announcement . " " . $date_nums[0];
            }
        } catch (\Exception $e) {
            return new JsonResponse('hola3', 400); //Ver info archivos en consola
        }

        // prepare pdf to export
        try {
            $recommendation_letter = MyRecommendationLetter::where('archive_id', $archive->id)->first();
            $score_parameters = ScoreParameter::where('rl_id', $recommendation_letter->id)->get();
            $custom_parameters = CustomParameter::where('rl_id', $recommendation_letter->id)->get();
            $parameters = Parameter::all();

            foreach ($score_parameters as $score) {
                foreach ($parameters as $parameter) {
                    if ($parameter->id === $score->parameter_id) {
                        $parameter->setAttribute('score', $score->score);
                    }
                }
            }

            $header_image =    asset('storage/headers/logod.png');

            $data = [
                'recommendation_letter' => $recommendation_letter,
                'appliant' => $archive->appliant,
                'announcement' => $archive->announcement,
                'academic_program' => $archive->announcement->academicProgram,
                'announcement_date_msg' => $announcement_date_msg,
                'score_parameters' => $score_parameters,
                'custom_parameters' => $custom_parameters,
                'parameters' => $parameters,
                'header_image' => $header_image
            ];

            $recommendation_letter_pdf = PDF::loadView('pdf.prueba', ["data" => $data])
                ->setOptions([
                    'defaultPaperSize' => 'a4',
                    'isJavaScriptEnabled' => true,
                    'isFontSubsettingEnabled' =>  true,
                    'dpi' => 120
                ]); //opciones para visualizar correctamente el pdf
        } catch (\Exception $e) {
            // return new JsonResponse('hola5', 400); //Ver info archivos en consola
            return $e->getMessage();
        }

        try {
            $path = '/app/archives/myArchivo.pdf';
            $recommendation_letter_pdf->save(storage_path($path));
        } catch (\Exception $e) {
            // return new JsonResponse('hola5', 400); //Ver info archivos en consola
            return $e->getMessage();
        }

        return $recommendation_letter_pdf->stream();
    }

    /**
     * 
     * Ver Carta de Recomendacion
     * 
     */
    public function seeAnsweredRecommendationLetter(Request $request, $archive_id, $rl_id)
    {
        // find the archive
        try {
            $archive = Archive::where('id', $archive_id)->first();
            $archive->loadMissing([
                // Cosas del aplicante
                'appliant',
                'announcement.academicProgram',
                // Documentos y secciones para expedinte
                'requiredDocuments',
                'personalDocuments',
                'curricularDocuments',
                'entranceDocuments',
                'intentionLetter',
                'recommendationLetter',
                'myRecommendationLetter',
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
                'appliantWorkingExperiences',
                'scientificProductions.authors',
                'humanCapitals'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse('No se pudo extraer informacion del expediente', 200); //Ver info archivos en consola
        }

        // collect user data
        try {
            $user_data_collect =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->appliant->id])->collect();
            if (sizeof($user_data_collect) > 0) {
                $user_data = $user_data_collect[0];
                //Se guarda el nombre del usuario en el modelo
                $archive->appliant->setAttribute('name', $user_data['name'] . ' ' . $user_data['middlename'] . ' ' . $user_data['surname']);
                $archive->appliant->setAttribute('birth_date', $user_data['birth_date']);
                $archive->appliant->setAttribute('curp', $user_data['curp']);
                $archive->appliant->setAttribute('age', $user_data['age']);
                $archive->appliant->setAttribute('gender', $user_data['gender']);
                $archive->appliant->setAttribute('birth_country', $user_data['nationality']);
                $archive->appliant->setAttribute('residence_country', $user_data['residence']);
                $archive->appliant->setAttribute('phone_number', $user_data['phone_number']);
                $archive->appliant->setAttribute('email', $user_data['email']);
                $archive->appliant->setAttribute('altern_email', $user_data['altern_email']);
                $archive->appliant->setAttribute('academic_degree', $user_data['academic_degree']);
            }
        } catch (\Exception $e) {
            return new JsonResponse('Error al conectar al portal de alumnos', 400); //Ver info archivos en consola
        }

        // Set the date 
        try {
            $date_nums = explode("-", $archive->announcement->to);
            $announcement_date_msg = "Convocatoria Junio 2022";
            if (sizeof($date_nums) > 0) {
                $dateObj   = DateTime::createFromFormat('!m', $date_nums[1]);
                $month_announcement = $dateObj->format('F');
                $announcement_date_msg = "Convocatoria " . $month_announcement . " " . $date_nums[0];
            }
        } catch (\Exception $e) {
            return new JsonResponse('No se puede obtener la fecha', 400); //Ver info archivos en consola
        }

        // prepare pdf to export
        try {
            $recommendation_letter = MyRecommendationLetter::where('id', $rl_id)->first();
            $score_parameters = ScoreParameter::where('rl_id', $recommendation_letter->id)->get();
            $custom_parameters = CustomParameter::where('rl_id', $recommendation_letter->id)->get();
            $parameters = Parameter::all();

            foreach ($score_parameters as $score) {
                foreach ($parameters as $parameter) {
                    if ($parameter->id === $score->parameter_id) {
                        $parameter->setAttribute('score', $score->score);
                    }
                }
            }

            // $url_LogoAA = public_path('/storage/headers/logod.png');

            $url_LogoAA =    asset('storage/headers/logod.png');
            // $image = base64_encode(file_get_contents($url_LogoAA));
            // // return new JsonResponse(['image'=>$image], 400); //Ver info archivos en consola
            // dd($image);
            $data = [
                'recommendation_letter' => $recommendation_letter,
                'appliant' => $archive->appliant,
                'announcement' => $archive->announcement,
                'academic_program' => $archive->announcement->academicProgram,
                'announcement_date_msg' => $announcement_date_msg,
                'score_parameters' => $score_parameters,
                'custom_parameters' => $custom_parameters,
                'parameters' => $parameters,
                'url_LogoAA' => $url_LogoAA
            ];

            

            $recommendation_letter_pdf = PDF::loadView('pdf.prueba', ["data" => $data])
                ->setOptions([
                    'defaultPaperSize' => 'a4',
                    'isJavaScriptEnabled' => true,
                    'isFontSubsettingEnabled' =>  true,
                    'dpi' => 120
                ]); //opciones para visualizar correctamente el pdf
        } catch (\Exception $e) {
            // return new JsonResponse('hola5', 400); //Ver info archivos en consola
            return $e->getMessage();
        }

        try {
            $path = '/app/archives/myArchivo.pdf';
            $recommendation_letter_pdf->save(storage_path($path));
        } catch (\Exception $e) {
            // return new JsonResponse('hola5', 400); //Ver info archivos en consola
            return $e->getMessage();
        }

        return $recommendation_letter_pdf->stream();
    }
}
