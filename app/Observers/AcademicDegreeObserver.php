<?php

namespace App\Observers;

use App\Models\AcademicDegree;
use App\Models\RequiredDocument;

class AcademicDegreeObserver
{
    /**
     * Handle the AcademicDegree "created" event.
     *
     * @param  \App\Models\AcademicDegree  $academicDegree
     * @return void
     */
    public function created(AcademicDegree $academicDegree)
    {
        $academicProgram = $academicDegree->archive->academicProgram;
        $requiredDocumentsId = [];

        switch($academicProgram->type)
        {
            case 'imarec': $requiredDocumentsId = RequiredDocument::bachelorDocumentsId(); break;
            case 'maestria': $requiredDocumentsId = RequiredDocument::bachelorDocumentsId(); break;
            case 'enrem': $requiredDocumentsId = RequiredDocument::bachelorDocumentsId(); break;
            case 'doctorado': $requiredDocumentsId = RequiredDocument::masterDocumentsId(); break;
        }

        $academicDegree->requiredDocuments()->attach($requiredDocumentsId);
    }

    /**
     * Handle the AcademicDegree "updated" event.
     *
     * @param  \App\Models\AcademicDegree  $academicDegree
     * @return void
     */
    public function updated(AcademicDegree $academicDegree)
    {
        //
    }

    /**
     * Handle the AcademicDegree "deleted" event.
     *
     * @param  \App\Models\AcademicDegree  $academicDegree
     * @return void
     */
    public function deleted(AcademicDegree $academicDegree)
    {
        //
    }

    /**
     * Handle the AcademicDegree "restored" event.
     *
     * @param  \App\Models\AcademicDegree  $academicDegree
     * @return void
     */
    public function restored(AcademicDegree $academicDegree)
    {
        //
    }

    /**
     * Handle the AcademicDegree "force deleted" event.
     *
     * @param  \App\Models\AcademicDegree  $academicDegree
     * @return void
     */
    public function forceDeleted(AcademicDegree $academicDegree)
    {
        //
    }
}
