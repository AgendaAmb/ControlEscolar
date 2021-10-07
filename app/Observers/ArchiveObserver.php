<?php

namespace App\Observers;

use App\Models\Archive;
use App\Models\RequiredDocument;

class ArchiveObserver
{
    /**
     * Handle the Archive "created" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function created(Archive $archive)
    {
        $archive->academicDegrees()->createMany([
            ['state'=>'Incompleto']
        ]);
        
        $archive->appliantWorkingExperiences()->createMany([
            ['state'=>'Incompleto']
        ]);

        $archive->scientificProductions()->createMany([
            ['state'=>'Incompleto']
        ]);

        $archive->appliantLanguages()->createMany([
            ['state'=>'Incompleto']
        ]);

        $archive->humanCapitals()->createMany([
            ['state'=>'Incompleto']
        ]);

        $archive->personalDocuments()->attach(RequiredDocument::personalDocumentsId());
        $archive->personalDocuments()->attach(RequiredDocument::entranceDocumentsId());
    }

    /**
     * Handle the Archive "updated" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function updated(Archive $archive)
    {
        //
    }

    /**
     * Handle the Archive "deleted" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function deleted(Archive $archive)
    {
        //
    }

    /**
     * Handle the Archive "restored" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function restored(Archive $archive)
    {
        //
    }

    /**
     * Handle the Archive "force deleted" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function forceDeleted(Archive $archive)
    {
        //
    }
}
