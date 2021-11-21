<?php

namespace App\Observers;

use App\Models\Archive;

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
        $academic_program = $archive->announcement->academicProgram;
        $role_id = $archive->appliant->roles()->first()->id;
        $personal_documents_id = $academic_program
            ->requiredDocuments()
            ->wherePivot('role_id', $role_id)
            ->where('type', 'personal')
            ->pluck('id');

        $entrance_documents_id = $academic_program
            ->requiredDocuments()
            ->wherePivot('role_id', $role_id)
            ->where('type', 'entrance')
            ->pluck('id');

        $curricular_documents_id = $academic_program
            ->requiredDocuments()
            ->recommendationLetter()
            ->pluck('id');

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

        $archive->personalDocuments()->attach($personal_documents_id);
        $archive->personalDocuments()->attach($entrance_documents_id);
        $archive->curricularDocuments()->attach($curricular_documents_id);
    }

    /**
     * Handle the Archive "updated" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function updated(Archive $archive){}

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
