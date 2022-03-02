<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecommendationLetter;
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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Agrega la carta de recomendacion 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addRecommendationLetter(StoreRecommendationLetter $request)
    {
        //existe o no registro de carta 


        /*
        en la carta de recomendacion se recibiran los siguientes parametros

        info del aplicante
            (token)
        info de carta de recomendacion
            (email de evaluador)
            (id carta recomendacion)
        */
        
        # Se busca expediente, para asignar nombre
        $archive = Archive::find($request->archive_id);
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
            return new JsonResponse('Cartas enviadas, no se permiten mas', 200);
        }

        # Verifica que la carta no se ha enviado del propio correo 
        foreach ($archive->myRecommendationLetter as $rl) {

            // el correo coincide
            if (strcmp($rl->email_evaluator, $request->email) != 0) {
                //token unico coincide
                if ($rl->token == $request->token) {
                    //no se ha respondido aun
                    if ($rl->answer <= 0) {

                        # Crear archivo PDF
                        //Se guarda en una variable local 
                        $recommendation_letter_pdf = PDF::loadView('pdf.recommendation-letter', $request)
                            ->setOptions([
                                'defaultPaperSize' => 'a4',
                                'isJavaScriptEnabled' => true,
                                'isFontSubsettingEnabled' =>  true,
                                'dpi' => 120
                            ]); //opciones para visualizar correctamente el pdf

                        //Se guarda en STORAGE
                        $path = 'archives/' . $request->archive_id . '/recommendation-letter/' . $request->recommendation_letter_id . '_answerBy' . $archive->email_evaluator . '_#' . $num_recommendation_letter_count .  '.pdf';
                        $recommendation_letter_pdf->save(storage_path($path));

                        #Actualizar modelos

                        try {
                            //carta de recomendacion
                            $rl->update($request->safe()->except($request->safe()->except('score_parameters', 'custom_parameters', 'recommendation_letter_id')));

                            //archivo de carta de recomendacion
                            $archive_rl = RecommendationLetter::where('rl_id', $rl->id)->update(['location'=> $path]);

                            //archivo requerido
                            $archive_required = ArchiveRequiredDocument::where('id', $archive_rl->required_document_id)->update(['location'=> $path]);;
                        } catch (\Exception $e) {
                            
                        }
                    }
                }
            }
        }
        # Se actualizan los registros ya existentes

        # Carta de recomendacion 
        foreach ($archive->myRecommendationLetter as $rl) {
            if ($rl->id == $request->recommendation_letter_id) {
                $rl->update($request->safe()->except($request->safe()->except('score_parameters', 'custom_parameters', 'recommendation_letter_id')));
                break;
            }
        }

        # Archivo pdf de carta


        // //Se guardan los datos en la tabla de recommendation_letter 
        // $data_rl_table = $request->safe()->except('score_parameters', 'custom_parameters', 'recommendation_letter_id');
        // MyRecommendationLetter::where('id', $request->recommendation_letter_id)->update($data_rl_table);

        // $data_score_table = $request->safe()->only('score_parameters');
        // //ciclo para crear y guardar los datos de score

        // $data_custom_parameter =  $request->safe()->only('custom_parameters');
        // //ciclo para crear y guardar parametros personalizadOS

        // #Creacion de modelos 

        // //Se crea carta de recomendacion (campos de texto y llaves foraneas)
        // $recommendation_letter  = MyRecommendationLetter::create($data_rl_table);
        // $res_rec = new JsonResponse($recommendation_letter);

        // foreach ($data_score_table as $data) {
        //     $res_param = new JsonResponse(ScoreParameter::create($data->validate([
        //         'rl_id' => ['required', 'integer'],
        //         'parameter_id' => ['required', 'integer'],
        //         'score' => ['required', 'string', 'max:255']
        //     ])));
        // }

        // foreach ($data_custom_parameter as $data) {
        //     $res_cust_param = new JsonResponse(CustomParameter::create($data->validate([
        //         'rl_id' => ['required', 'integer', 'max:255'],
        //         'text' => ['required', 'string', 'max:255'],
        //         'score' => ['required', 'string', 'max: 225']
        //     ])));
        // }

        //Se crea el fila en ArchiveRequiredDocument una vez realizado todo 
        // $my_archive_required_document = ArchiveRequiredDocument::create([
        //     'archive_id' => $request->archive_id,
        //     'required_document_id' => $required_document_id,
        //     'location' => $path
        // ]);

        //Se retorna una respueta SI SE PUDO O NO GUARDAR EL ARCHIVO
        // return new JsonResponse(RecommendationLetter::create([
        //     'rl_id' => $request->recommendation_letter_id,
        //     'required_document_id' => $my_archive_required_document->id,
        //     'location' => $path
        // ]), 200);

        return new JsonResponse($path, 200);
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
            $rl = MyRecommendationLetter::where(
                'token', $token
            );
             
        } catch (\Exception $e) {
            return view('postulacion.error-noAppliant')
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
            return view('postulacion.error-lettersSent')
                ->with($archive->appliant->id);
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
        $appliant = $archive->appliant;
        $academic_program = $archive->announcement->academicProgram;

        //Enviar los datos necesarios 
        return view('postulacion.recommendation-letter')
            ->with('recommendation_letter', $rl)
            ->with('appliant', $appliant)                   //usuario 
            ->with('announcement', $announcement)
            ->with('parameters', $parameters); //programa academico
    }
}
