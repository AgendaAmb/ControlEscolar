<?php

namespace App\Observers;

use App\Models\AppliantLanguage;

class AppliantLanguageObserver
{
    /**
     * Handle the AppliantLanguage "created" event.
     *
     * @param  \App\Models\AppliantLanguage  $appliantLanguage
     * @return void
     */
    public function created(AppliantLanguage $appliantLanguage)
    {
        $academic_program = $appliantLanguage->archive->announcement->academicProgram;
        $role_id = $appliantLanguage->archive->appliant->roles()->first()->id;
        $language_documents_id = $academic_program
            ->requiredDocuments()
            ->wherePivot('role_id', $role_id)
            ->where('type', 'language')
            ->pluck('id');

        $appliantLanguage->requiredDocuments()->attach($language_documents_id);
    }

    /**
     * Handle the AppliantLanguage "updated" event.
     *
     * @param  \App\Models\AppliantLanguage  $appliantLanguage
     * @return void
     */
    public function updated(AppliantLanguage $appliantLanguage)
    {
        //
    }

    /**
     * Handle the AppliantLanguage "deleted" event.
     *
     * @param  \App\Models\AppliantLanguage  $appliantLanguage
     * @return void
     */
    public function deleted(AppliantLanguage $appliantLanguage)
    {
        //
    }

    /**
     * Handle the AppliantLanguage "restored" event.
     *
     * @param  \App\Models\AppliantLanguage  $appliantLanguage
     * @return void
     */
    public function restored(AppliantLanguage $appliantLanguage)
    {
        //
    }

    /**
     * Handle the AppliantLanguage "force deleted" event.
     *
     * @param  \App\Models\AppliantLanguage  $appliantLanguage
     * @return void
     */
    public function forceDeleted(AppliantLanguage $appliantLanguage)
    {
        //
    }
}
