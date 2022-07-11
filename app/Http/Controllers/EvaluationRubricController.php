<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEvaluationRubricRequest;
use App\Http\Resources\RubricResource;
use App\Http\Resources\RubricAverageResource;
use App\Models\EvaluationRubric;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Archive;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RubricExport;

class EvaluationRubricController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EvaluationRubric $evaluationRubric)
    {
        $evaluationRubric->load([
            'archive:id,user_id,user_type,announcement_id',
            'archive.announcement.academicProgram:id,name,type',
            'basicConcepts.evaluationConceptDetails',
            'academicConcepts.evaluationConceptDetails',
            'researchConcepts.evaluationConceptDetails',
            'workingExperienceConcepts.evaluationConceptDetails',
            'personalAttributesConcepts.evaluationConceptDetails'
        ]);

        $rubricResource = new RubricResource($evaluationRubric);

        //! Temporal - obtener los datos basicos del postulante
        $archiveModel = Archive::where('id', $evaluationRubric->archive_id)->first();
        if ($archiveModel === null) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        try {
            $archiveModel->loadMissing([
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }
        
        $rubricResource['basic_concepts'] = $archiveModel;

        // return $archiveModel;
        // return $rubricResource->toArray($request);
    
        return view('entrevistas.rubrica', $rubricResource->toArray($request));
    }
    
    // Muestra la rubrica promedio (Solo el coordinador va a ser capaz de visualizar)
    public function show_average(Request $request, $id)
    {
        // Toma la primera rúbrica de la entrevista
        $evaluationRubric = EvaluationRubric::where('archive_id', $id)->first();
        $grade = Archive::find($id)->announcement->academicProgram->type;

        if(!isset($evaluationRubric)){
            return "No existe rúbrica para mostrar";
        }
        
        // Obtiene las rubricas asociadas a un postulante mediante archive_id 
        $evaluation_rubrics = EvaluationRubric::where('archive_id', $evaluationRubric->archive_id)->get();
        
        // Se verifica que todas las rubricas esten completas antes de calcular
        foreach ($evaluation_rubrics as $ev) {
            if($ev->isComplete == 0)return "Aún faltan rúbricas por terminar.";
        }

        // Average scores per rubric concept
        $avg_score = [
            'num_rubrics' => 0,
            'basic'     => 0.0, 
            'academic'  => 0.0,
            'research'  => 0.0,
            'exp'       => 0.0,
            'personal'  => 0.0,
            'rubric_total' => 0.0,
        ];

        $avg_collection = [];
        $score = 0.0;

        try{
            // Para cada una de las rubricas se calcula el promedio por sección
            foreach($evaluation_rubrics as $ev){
                $avg_score['num_rubrics']+=1;
                $avg_score['basic'] = $ev->getAverageScoreBasicConcepts($grade);
                $avg_score['academic'] = $ev->getAverageScoreAcademicConcepts($grade);
                $avg_score['research'] = $ev->getAverageScoreResearchConcepts($grade);
                $avg_score['exp'] = $ev->getAverageWorkingExperienceConcepts($grade);
                $avg_score['personal'] = $ev->getAverageWorkingPersonalAttributesConcepts($grade);
                // Suma del total
                $avg_score['rubric_total'] = $avg_score['basic'] + $avg_score['academic'] + $avg_score['research'] + $avg_score['exp'] + $avg_score['personal'];
                $score+=$avg_score['rubric_total'];
                array_push($avg_collection, $avg_score);
            }
        } catch (\Exception $e) {
            return 'Error en datos de rubricas de rúbricas asociadas';
        }

        // Se obtienen los datos de cada rubrica
        $rubrics_collection = RubricAverageResource::collection($evaluation_rubrics);

        //! Temporal - obtener los datos basicos del postulante
        $archiveModel = Archive::where('id', $evaluation_rubrics[0]->archive_id)->first();
        if ($archiveModel === null) {
            return 'No se pudo extraer informacion del archivo';
        }

        try {
            $archiveModel->loadMissing([
                'academicDegrees.requiredDocuments',
                'appliantLanguages.requiredDocuments',
            ]);
        } catch (\Exception $e) {
            return 'No se pudo extraer informacion del archivo - [125]';
        }

        // Actualización del rubric score temporal
        $archiveModel->rubric_score = round($score / count($evaluation_rubrics), 2);
        $archiveModel->save();

        $data = [
            "rubrics" => [],
            "appliant" => $rubrics_collection[0]->toArray($request)['appliant'],
            "data" => $archiveModel,
            "avg_collection" => $avg_collection,
            "type" => $grade,
            "id" => $id
        ];

        foreach($rubrics_collection as $rc){
            array_push($data['rubrics'], $rc->toArray($request)['rubric']);
        }

        // return $data;
        return view('entrevistas.rubricaPromedio', $data);
    }

    // Muestra la rubrica promedio (Solo el coordinador va a ser capaz de visualizar)
    public function export_rubric(Request $request, $id)
    {
        return Excel::download(new RubricExport($request,$id), 'rubric.xlsx');
    }

    // Muestra la rubrica promedio para comite academico (modulo de rodrigo)
    public function show_average_ca(Request $request, $id)
    {
        return 'Working';
        // // Toma la primera rúbrica de la entrevista solo para obtener los datos
        // $evaluationRubric = EvaluationRubric::where('archive_id', $id)->first();
        // $grade = Archive::find($id)->announcement->academicProgram->type;

        // if (!isset($evaluationRubric)) {
        //     return "No existe rúbrica para mostrar";
        // }

        // // Obtiene las rúbricas asociadas a un postulante mediante archive_id 
        // $evaluation_rubrics = EvaluationRubric::where('archive_id', $evaluationRubric->archive_id)->get();

        // // Se verifica que todas las rubricas esten completas antes de calcular
        // // foreach ($evaluation_rubrics as $ev) {
        // //     if($ev->isComplete == 0)return "Aún faltan rúbricas por terminar.";
        // // }

        // // Unified scores
        // $avg_score = [
        //     'num_rubrics' => 0,
        //     'basic'     => 0.0,
        //     'academic'  => 0.0,
        //     'research'  => 0.0,
        //     'exp'       => 0.0,
        //     'personal'  => 0.0,
        //     'rubric_total' => 0.0,
        //     'rubric_average' => 0.0
        // ];

        // // Para cada una de las rubricas se calcula el promedio por sección
        // foreach ($evaluation_rubrics as $ev) {
        //     $avg_score['num_rubrics'] += 1;
        //     $avg_score['basic']+=$ev->getAverageScoreBasicConcepts($grade);
        //     $avg_score['academic']+=$ev->getAverageScoreAcademicConcepts($grade);
        //     $avg_score['research']+=$ev->getAverageScoreResearchConcepts($grade);
        //     $avg_score['exp']+=$ev->getAverageWorkingExperienceConcepts($grade);
        //     $avg_score['personal']+=$ev->getAverageWorkingPersonalAttributesConcepts($grade);
        // }

        // // Calculo de la ponderaciónes de la rúbrica
        // $avg_score['basic'] /= $avg_score['num_rubrics'];
        // $avg_score['academic'] /= $avg_score['num_rubrics'];
        // $avg_score['research'] /= $avg_score['num_rubrics'];
        // $avg_score['exp'] /= $avg_score['num_rubrics'];
        // $avg_score['personal'] /= $avg_score['num_rubrics'];
        // $avg_score['rubric_total'] = $avg_score['basic'] + $avg_score['academic'] + $avg_score['research'] + $avg_score['exp'] + $avg_score['personal'];
        // $avg_score['rubric_average'] = $avg_score['rubric_total'];  // duplied

        // // Se obtienen los datos de cada rúbrica
        // $rubrics_collection = RubricAverageResource::collection($evaluation_rubrics);

        // //! Temporal - obtener los datos basicos del postulante
        // $archiveModel = Archive::where('id', $evaluation_rubrics[0]->archive_id)->first();
        // if ($archiveModel === null) {
        //     return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }
        // try {
        //     $archiveModel->loadMissing([
        //         'academicDegrees.requiredDocuments',
        //         'appliantLanguages.requiredDocuments',
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'No se pudo extraer informacion del archivo'], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        // $data = [
        //     "rubric" => [],
        //     "scores" => $avg_score,
        //     "appliant" => $rubrics_collection[0]->toArray($request)['appliant'],
        //     "data" => $archiveModel,
        //     "type" => $grade,
        //     "id" => $id
        // ];

        // // Unificando rubricas
        // $unified = $rubrics_collection[0]->toArray($request)['rubric'];
        // // return $unified['basic_concepts'][0]['description'];
        
        // for($i = 1; $i < count($rubrics_collection); $i++){
        //     for($j = 0; $j < count($rubrics_collection[$i]->toArray($request)['rubric']['basic_concepts']); $j++){
        //        $unified['basic_concepts'][$j]['notes'] = $unified['basic_concepts'][$j]['notes'] . " - " . $rubrics_collection[$i]->toArray($request)['rubric']['basic_concepts'][$j]['notes'];
        //     }

        //     for ($j = 0; $j < count($rubrics_collection[$i]->toArray($request)['rubric']['academic_concepts']); $j++) {
        //         $unified['academic_concepts'][$j]['notes'] = $unified['academic_concepts'][$j]['notes'] . " - " . $rubrics_collection[$i]->toArray($request)['rubric']['academic_concepts'][$j]['notes'];
        //     }

        //     // for ($j = 0; $j < count($rubrics_collection[$i]->toArray($request)['rubric']['research_concepts']); $j++) {
        //     //     $unified['research_concepts'][$j]['notes'] = 'hola';
        //     // }

        //     for ($j = 0; $j < count($rubrics_collection[$i]->toArray($request)['rubric']['working_experience_concepts']); $j++) {
        //         $unified['working_experience_concepts'][$j]['notes'] = $unified['working_experience_concepts'][$j]['notes'] . " - " . $rubrics_collection[$i]->toArray($request)['rubric']['working_experience_concepts'][$j]['notes'];
        //     }

        //     for ($j = 0; $j < count($rubrics_collection[$i]->toArray($request)['rubric']['personal_attributes_concepts']); $j++) {
        //         $unified['personal_attributes_concepts'][$j]['notes'] = $unified['personal_attributes_concepts'][$j]['notes'] . " - " . $rubrics_collection[$i]->toArray($request)['rubric']['personal_attributes_concepts'][$j]['notes'];
        //     }   
        // }

        // return $unified;

        // foreach ($rubrics_collection as $rc) {
        //     array_push($data['rubrics'], $rc->toArray($request)['rubric']);
        // }

        // return $data;
        // return view('entrevistas.rubricaPromedio', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Updates an existing evaluation rubric pivot.
     *
     * @param  array $concepts
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    private function updatePivot(array $concepts, EvaluationRubric $evaluationRubric)
    {
        foreach ($concepts as $concept)
        {
            $evaluationRubric->evaluationConcepts()->updateExistingPivot($concept['id'], [
                'score' => $concept['score'],
                'notes' => $concept['notes']
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluationRubricRequest  $request
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluationRubricRequest $request, EvaluationRubric $evaluationRubric)
    {
       
        // $this->updatePivot($request->basic_concepts, $evaluationRubric);
        $this->updatePivot($request->academic_concepts, $evaluationRubric);
        $this->updatePivot($request->research_concepts, $evaluationRubric);
        $this->updatePivot($request->working_experience_concepts, $evaluationRubric);
        $this->updatePivot($request->personal_attributes_concepts, $evaluationRubric);

        
        $evaluationRubric->fill($request->safe()->only('considerations','additional_information','dictamen_ce'));
        if($request->state=="send")$evaluationRubric->isComplete=true;
        $evaluationRubric->save();
        $evaluationRubric->researchConceptsDetails = $details = collect($request->research_concepts)->map(function($concept){
            return $concept['evaluation_concept_details'];
        })->flatten(2)
        ->toArray();

        return new JsonResponse(['message'=>'Solicitud actualizada'], JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvaluationRubric $evaluationRubric)
    {
        //
    }
}
