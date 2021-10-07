<?php

namespace App\Observers;

use App\Models\AppliantLanguage;
use App\Models\RequiredDocument;

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
        $appliantLanguage->requiredDocuments()->attach(RequiredDocument::languageDocumentsId());
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