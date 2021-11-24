<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEvaluationRubricRequest;
use App\Http\Resources\RubricResource;
use App\Models\EvaluationRubric;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            'archive.announcement.academicProgram:id,name',
            'basicConcepts.evaluationConceptDetails',
            'academicConcepts.evaluationConceptDetails',
            'researchConcepts.evaluationConceptDetails',
            'workingExperienceConcepts.evaluationConceptDetails',
            'personalAttributesConcepts.evaluationConceptDetails'
        ]);

        $rubricResource = new RubricResource($evaluationRubric);
        
        return view('entrevistas.rubrica', $rubricResource->toArray($request));
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

        

        $evaluationRubric->fill($request->safe()->only('considerations','additional_information'));
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
