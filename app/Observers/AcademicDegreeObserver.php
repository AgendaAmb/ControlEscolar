<?php

namespace App\Observers;

use App\Models\AcademicDegree;
use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Storage;

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
        $academicProgram = $academicDegree->archive->announcement->academicProgram;
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
        # En caso de que el aspirante ya haya completado de llenar los
        # datos, se le da la opción de agregar otro grado académico.
        if ($academicDegree->state === 'Completo')
        {
            $archive = $academicDegree->archive;
            $archive->academicDegrees()->createMany([['state'=>'Incompleto']]);
        }
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
