<?php

namespace App\Observers;

use App\Models\EvaluationConcept;
use App\Models\EvaluationRubric;

class EvaluationRubricObserver
{
    /**
     * Handle the EvaluationRubric "created" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function created(EvaluationRubric $evaluationRubric)
    {
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('basic')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('academic')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('research')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('working_experience')->pluck('id'));
        $evaluationRubric->evaluationConcepts()->attach(EvaluationConcept::type('personal_attributes')->pluck('id'));
    }

    /**
     * Handle the EvaluationRubric "updated" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function updated(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "deleted" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function deleted(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "restored" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function restored(EvaluationRubric $evaluationRubric)
    {
        //
    }

    /**
     * Handle the EvaluationRubric "force deleted" event.
     *
     * @param  \App\Models\EvaluationRubric  $evaluationRubric
     * @return void
     */
    public function forceDeleted(EvaluationRubric $evaluationRubric)
    {
        //
    }
}
