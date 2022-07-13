<?php

namespace App\Observers;

use App\Models\RequiredDocument;
use App\Models\WorkingExperience;

class WorkingExperienceObserver
{
    /**
     * Handle the WorkingExperience "created" event.
     *
     * @param  \App\Models\WorkingExperience  $workingExperience
     * @return void
     */
    public function created(WorkingExperience $workingExperience)
    {
        $required_documents_ids = RequiredDocument::where('type','working')->pluck('id');
        $workingExperience->requiredDocuments()->attach($required_documents_ids);
    }

    /**
     * Handle the WorkingExperience "updated" event.
     *
     * @param  \App\Models\WorkingExperience  $workingExperience
     * @return void
     */
    public function updated(WorkingExperience $workingExperience)
    {
        //
    }

    /**
     * Handle the WorkingExperience "deleted" event.
     *
     * @param  \App\Models\WorkingExperience  $workingExperience
     * @return void
     */
    public function deleted(WorkingExperience $workingExperience)
    {
        //
    }

    /**
     * Handle the WorkingExperience "restored" event.
     *
     * @param  \App\Models\WorkingExperience  $workingExperience
     * @return void
     */
    public function restored(WorkingExperience $workingExperience)
    {
        //
    }

    /**
     * Handle the WorkingExperience "force deleted" event.
     *
     * @param  \App\Models\WorkingExperience  $workingExperience
     * @return void
     */
    public function forceDeleted(WorkingExperience $workingExperience)
    {
        //
    }
}
