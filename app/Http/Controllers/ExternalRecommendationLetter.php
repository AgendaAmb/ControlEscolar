<?php

namespace App\Http\Controllers;
use App\Helpers\MiPortalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecommendationLetter;
use Illuminate\Support\Facades\{
    DB,
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
        $message ='Exito';
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
                        $recommendation_letter->update($request->safe()->except(['score_parameters', 'custom_parameters', 'recommendation_letter_id','appliant','announcement']));

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
            }else{
                $message = 'Token invalido';
            }
        }else{
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
        try{
            #Peticion a portal (Busca usuario)
            $user_collection =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $appliant->id])->collect();
        }catch (\Exception $e) {
            return new JsonResponse('Peticion erronea',502);
        }

        //Existe el postulante en el portal 
        if($user_collection){
            $user_data = $user_collection[0]; //Se retorno solo uno entonces se extrae informacion 
             //Add data portal to local collection USER
            $appliant->setAttribute('curp',$user_data['curp']);
            $appliant->setAttribute('name',$user_data['name']);
            $appliant->setAttribute('middlename',$user_data['middlename']);
            $appliant->setAttribute('surname',$user_data['surname']);
            $appliant->setAttribute('age',$user_data['age']);
            $appliant->setAttribute('gender',$user_data['gender']);
            $appliant->setAttribute('birth_country',$user_data['nationality']);
            $appliant->setAttribute('birth_state',$user_data['residence']);
            $appliant->setAttribute('residence_country',$user_data['residence']);
            $appliant->setAttribute('phone_number',$user_data['phone_number']);
            $appliant->setAttribute('email',$user_data['email']);
            $appliant->setAttribute('altern_email',$user_data['altern_email']);
            $appliant->setAttribute('academic_degree',$user_data['academic_degree']);
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
        $recommendation_letter = MyRecommendationLetter::find(1)->first();
        $appliant = User::find(3)->first();
        $data = [
            'recommendation_letter' => $recommendation_letter,
            'appliant' => $appliant
        ];
        
        $recommendation_letter_pdf = PDF::loadView('pdf.prueba', ["recommendation_letter" => $recommendation_letter])
            ->setOptions([
                'defaultPaperSize' => 'a4',
                'isJavaScriptEnabled' => true,
                'isFontSubsettingEnabled' =>  true,
                'dpi' => 120
            ]); //opciones para visualizar correctamente el pdf

            

        try {
            $path = '/app/archives/myArchivo.pdf';
            $recommendation_letter_pdf->save(storage_path($path));
        } catch (\Exception $e) {
            return $e->getMessage();
        }


        return $recommendation_letter_pdf->stream();
    }

    /**
     * 
     * Ver Carta de Recomendacion
     * 
     */
    public function seeAnsweredRecommendationLetter(Request $request)
    {
        try{
            $request->validate([
                'rl_id' => ['required', 'numeric','exists:recommendation_letter,id'],
                'archive_id' => ['required', 'numeric','exists:archives,id'],
                'user_id' => ['required', 'numeric','exists:users,id'],
            ]);
        }catch (\Exception $e) {
            return new JsonResponse($e,JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            // Se extrae el archivo de postulacion
            $archive = Archive::where('id', $request->archive_id)->where('user_id',$request->user_id)->first();

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

            //Obtiene la informacion del aplicante 
            $appliant = $archive->appliant;

        }catch (\Exception $e) {
            return new JsonResponse('El archivo no existe',JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }


        //Peticion a portal
        try{
            #Peticion a portal (Busca usuario)
            $user_collection =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $appliant->id])->collect();
            //Existe el postulante en el portal 
            if($user_collection){
                $user_data = $user_collection[0]; //Se retorno solo uno entonces se extrae informacion 
                //Add data portal to local collection USER
                $appliant->setAttribute('curp',$user_data['curp']);
                $appliant->setAttribute('name',$user_data['name']);
                $appliant->setAttribute('middlename',$user_data['middlename']);
                $appliant->setAttribute('surname',$user_data['surname']);
                $appliant->setAttribute('age',$user_data['age']);
                $appliant->setAttribute('gender',$user_data['gender']);
                $appliant->setAttribute('birth_country',$user_data['nationality']);
                $appliant->setAttribute('birth_state',$user_data['residence']);
                $appliant->setAttribute('residence_country',$user_data['residence']);
                $appliant->setAttribute('phone_number',$user_data['phone_number']);
                $appliant->setAttribute('email',$user_data['email']);
                $appliant->setAttribute('altern_email',$user_data['altern_email']);
                $appliant->setAttribute('academic_degree',$user_data['academic_degree']);
                /* Faltaria
                    Academic degree
                    // $appliant->setAttribute('academic_degree',$user_data['academic_degree']);
                    Dependencia
                    // $appliant->setAttribute('dependency',$user_data['dependency']);
                */
            }
        }catch (\Exception $e) {
            return new JsonResponse('Error en peticion al portal',JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        try{
             // $parts_announcement_date = explode("-", $archive->announcement->to);
            $date = date('F, Y', strtotime($archive->announcement->to));

            // Get recommendation letter
            $recommendation_letter = MyRecommendationLetter::where('id', $request->rl_id)->first();

            //Get parameters to evaluate of rl
            $parameters = Parameter::all();

            // Get score parameters
            $score_parameters = ScoreParameter::where('rl_id', $request->rl_id);

            //get custom parameters
            $custom_parameters = CustomParameter::where('rl_id', $request->rl_id);

            // $recommendation_letter->setAttribute('parameters',$parameters);
            $recommendation_letter->setAttribute('score_parameters',$score_parameters);
            $recommendation_letter->setAttribute('custom_parameters',$custom_parameters);
            // $recommendation_letter->setAttribute('appliant',$appliant);
            // $recommendation_letter->setAttribute('announcement', $archive->announcement);
            $recommendation_letter->setAttribute('announcement_date', $date);
        }catch (\Exception $e) {
            return new JsonResponse('Error en extraer informacion de la base de datos',JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        // return new JsonResponse($recommendation_letter->toArray(),JsonResponse::HTTP_UNPROCESSABLE_ENTITY);


        try{
            $pdf = PDF::loadView('postulacion.recommendationLetter.pruebapdf');
            $pdf->loadHTML('<h1>Hola<h1>');
                    return $pdf->stream();

            // return $pdf->download('CartaRecomendacion_Appliant_'.$appliant->id.'_AnswerBy_'.$recommendation_letter->email_evaluator.'.pdf');
        }catch (\Exception $e) {
            return new JsonResponse($e,JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        // return $pdf->stream();

        return new JsonResponse('No se pudo cargar el documento',JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
