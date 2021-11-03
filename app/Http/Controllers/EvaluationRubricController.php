<?php

namespace App\Http\Controllers;

use App\Http\Resources\RubricResource;
use App\Models\EvaluationRubric;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvaluationRubric $evaluationRubric)
    {
        //
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
