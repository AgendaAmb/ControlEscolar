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
            
        $appliant = $request->appliant;
        $announcement = $request->announcement;
        $parameters = $request->score_parameters;
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

                    } catch (\Exception $e) {
                        return new JsonResponse(
                            'no se cargaron modelos de archivos',
                            200
                        );
                    }
                    

                    # Crear archivo PDF
                    //Se guarda en una variable local 
                    try {
                        $recommendation_letter_pdf = PDF::loadView('pdf.recommendation-letter', compact('recommendation_letter', 'appliant', 'announcement','parameters'))
                        ->setOptions([
                            'defaultPaperSize' => 'a4',
                            'isJavaScriptEnabled' => true,
                            'isFontSubsettingEnabled' =>  true,
                            'dpi' => 120
                        ]); //opciones para visualizar correctamente el pdf
                        //Se guarda en STORAGE
                    } catch (\Exception $e) {
                        return new JsonResponse(
                            'el pdf no se genero',
                            200
                        );
                    }
                    
                    $recommendation_letter_pdf = PDF::loadView('pdf.recommendation-letter', compact('recommendation_letter', 'appliant', 'announcement','parameters'))
                        ->setOptions([
                            'defaultPaperSize' => 'a4',
                            'isJavaScriptEnabled' => true,
                            'isFontSubsettingEnabled' =>  true,
                            'dpi' => 120
                        ]); //opciones para visualizar correctamente el pdf
                        //Se guarda en STORAGE

                        
                    $path = 'app/'. 'archives/' . $request->archive_id . 'entranceDocuments/' .'recommendation_letter_'. $request->recommendation_letter_id . '_answerBy_' . $recommendation_letter->email_evaluator .  '.pdf';
                    $recommendation_letter_pdf->save(storage_path($path));

                    #Actualizar modelos

                    try {
                        //carta de recomendacion
                        $recommendation_letter->update($request->safe()->except($request->safe()->except('score_parameters', 'custom_parameters', 'recommendation_letter_id')));
                        //archivo de carta de recomendacion
                        $archive_rl->update(['location' => $path]);
                        //archivo requerido
                        $archive_required->update(['location' => $path]);;
                    } catch (\Exception $e) {
                        return new JsonResponse('Error al actualizar registros de locacion', 200);
                    }
                } else {
                    return new JsonResponse(
                        'La carta ya fue respondida, agrademos tu participacion',
                        200,
                    );
                }
            }
        }

        return new JsonResponse('no se pudo guardar la carta, lo sentimos, trabajaremos en ello', 200);
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
            ->with('parameters', $parameters)
            ->with('token',$token); //programa academico
    }
}
