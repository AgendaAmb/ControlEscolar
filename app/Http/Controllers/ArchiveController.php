<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAcademicDegreeRequest;
use App\Models\AcademicDegree;
use App\Models\AcademicProgram;
use App\Models\Archive;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request; 

class ArchiveController extends Controller
{
    /**
     * Vistas de los programas académicos
     */
    public const ACADEMIC_PROGRAM_VIEWS = [
        'maestria' => 'maestria',
        'doctorado' => 'doctorado',
        'enrem' => 'enrem',
        'imarec' => 'imarec',
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postulacion(Request $request, $academicProgramName)
    {
        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);
        $archive = Archive::with(['entranceDocuments' => function($query){

            return $query->where('intention_letter', false)->where('recommendation_letter', false);
        }])->firstWhere('id', 1);

        return view('postulacion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName])
        ->with('archive', $archive)
        ->with('academic_program', $academic_program);
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateMotivation(Request $request)
    {
        Archive::where('id', $request->archive_id)->update(['motivation'=>$request->motivation]);

        return new JsonResponse(AcademicDegree::find($request->archive_id)->motivation);
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateArchivePersonalDocument(Request $request)
    {
        $archive = Archive::find($request->archive_id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$request->archive_id.'/personalDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->personalDocuments()->detach($request->requiredDocumentId);
        $archive->personalDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->personalDocuments()
            ->select('required_documents.*','archive_required_document.location as location')
            ->where('id', $request->requiredDocumentId)
            ->first()
        );
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateArchiveEntranceDocument(Request $request)
    {
        $archive = Archive::find($request->archive_id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$request->archive_id.'/entranceDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $archive->entranceDocuments()->detach($request->requiredDocumentId);
        $archive->entranceDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->entranceDocuments()
            ->select('required_documents.*','archive_required_document.location as location')
            ->where('id', $request->requiredDocumentId)
            ->first()
        );
    }

    /**
     * Actualiza los datos académicos del postulante.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAcademicDegree(UpdateAcademicDegreeRequest $request)
    {
        AcademicDegree::where('id', $request->id)->update($request->safe()->toArray());

        return new JsonResponse(AcademicDegree::find($request->id));
    }

    /**
     * Actualiza un documento requerido, para el grado académico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAcademicDegreeRequiredDocument(Request $request)
    {
        $academic_degree = AcademicDegree::find('id', $request->id);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$request->archive_id.'/academicDocuments', 
            $request->requiredDocumentId.'.pdf'
        );

        # Asocia los documentos requeridos.
        $academic_degree->requiredDocuments()->detach($request->requiredDocumentId);
        $academic_degree->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(AcademicDegree::find($request->id));
    }
}