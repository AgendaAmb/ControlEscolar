<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequiredDocumentFileRequest;
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

        return view('postulacion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName])
        ->with('archive', Archive::find(1))
        ->with('academic_program', $academic_program);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guardaDocumentoPersonal(NewRequiredDocumentFileRequest $request)
    {
        # Por ahora todo irá a una misma solicitud...
        $archive = Archive::find(1);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$archive->id, 
            $request->requiredDocumentId.'.pdf'
        );

        $archive->requiredDocuments()->detach($request->requiredDocumentId);
        $archive->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(
            $archive->requiredDocuments()
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
            $request->id.'.pdf'
        );

        # Asocia los documentos requeridos.
        $academic_degree->requiredDocuments()->detach($request->requiredDocumentId);
        $academic_degree->requiredDocuments()->attach($request->requiredDocumentId, ['location' => $ruta]);

        return new JsonResponse(AcademicDegree::find($request->id));
    }
}