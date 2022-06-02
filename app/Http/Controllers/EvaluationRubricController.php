<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEvaluationRubricRequest;
use App\Http\Resources\RubricResource;
use App\Http\Resources\RubricAverageResource;
use App\Models\EvaluationRubric;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // return $rubricResource;

        return view('entrevistas.rubrica', $rubricResource->toArray($request));
    }
    
    // Muestra la rubrica promedio (Solo el coordinador va a ser capaz de visualizar)
    public function show_average(Request $request, $grade, $id)
    {
        $evaluationRubric = EvaluationRubric::where('archive_id', $id)->first();

        if(!isset($evaluationRubric)){
            return "No existe rúbrica ";
        }
        
        // Obtiene las rubricas asociadas a un postulante mediante archive_id 
        $evaluation_rubrics = EvaluationRubric::where('archive_id', $evaluationRubric->archive_id)->get();
        
        // Average scores per rubric concept
        $avg_score = [
            'num_rubrics' => 0,
            'basic'     => 0.0, 
            'academic'  => 0.0,
            'research'  => 0.0,
            'exp'       => 0.0,
            'personal'  => 0.0,
        ];

        foreach($evaluation_rubrics as $ev){
            $avg_score['num_rubrics']+=1;
            $avg_score['basic']+=$ev->getAverageScoreBasicConcepts($grade);
            $avg_score['academic']+=$ev->getAverageScoreAcademicConcepts($grade);
            $avg_score['research']+=$ev->getAverageScoreResearchConcepts($grade);
            $avg_score['exp']+=$ev->getAverageWorkingExperienceConcepts($grade);
            $avg_score['personal']+=$ev->getAverageWorkingPersonalAttributesConcepts($grade);
        }

        // Average
        $avg_score['basic']/=$avg_score['num_rubrics'];
        $avg_score['academic']/=$avg_score['num_rubrics'];
        $avg_score['research']/=$avg_score['num_rubrics'];
        $avg_score['exp']/=$avg_score['num_rubrics'];
        $avg_score['personal']/=$avg_score['num_rubrics'];

        return $avg_score;
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
       
        $this->updatePivot($request->basic_concepts, $evaluationRubric);
        $this->updatePivot($request->academic_concepts, $evaluationRubric);
        $this->updatePivot($request->research_concepts, $evaluationRubric);
        $this->updatePivot($request->working_experience_concepts, $evaluationRubric);
        $this->updatePivot($request->personal_attributes_concepts, $evaluationRubric);

        
        $evaluationRubric->fill($request->safe()->only('considerations','additional_information','dictamen_ce'));
        $request->state=="send"?$evaluationRubric->isComplete=true:$evaluationRubric->isComplete=false;
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
