<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Models\ArchiveRequiredDocument;
use App\Models\RequiredDocument;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $foo = RequiredDocument::addSelect([
            'location' => ArchiveRequiredDocument::select()
        ])->type('personal');


        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);
       
        
        return view('postulacion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName])
        ->with('academic_program', $academic_program)
        ->with('personal_documents', RequiredDocument::type('personal')->get())
        ->with('bachelor_documents', RequiredDocument::type('academic-lic')->get())
        ->with('master_documents', RequiredDocument::type('academic-mast')->get())
        ->with('entrance_documents', RequiredDocument::type('entrance')
        ->where('intention_letter', false)
        ->where('recommendation_letter', false)
        ->get());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subirCartaIntencion(Request $request, $academicProgramName)
    {
        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);
        
        return view('carta-intencion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName])
        ->with('academic_program', $academic_program)
        ->with('personal_documents', RequiredDocument::type('personal')->get())
        ->with('bachelor_documents', RequiredDocument::type('academic-lic')->get())
        ->with('master_documents', RequiredDocument::type('academic-mast')->get())
        ->with('entrance_documents', RequiredDocument::type('entrance')
        ->where('intention_letter', false)
        ->where('recommendation_letter', false)
        ->get());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subirCartaRecomendacion(Request $request, $academicProgramName)
    {
        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);

        # Solo se pueden otorgar las cartas de intención, si otra 
        # persona todavía no se la otorga al postulante.
        $curricular_documents = $academic_program
            ->requiredDocuments()
            ->type('curricular')
            ->where('recommendation_letter', true)
            ->doesntHave('documents')
            ->limit(1)
            ->get();

        return view(
            'carta-recomendacion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName]

        )->with('academic_program', $academic_program
        )->with('personal_documents', []
        )->with('academic_documents', []
        )->with('entrance_documents', []
        )->with('curricular_documents', $curricular_documents
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guardaDocumentoRequerido(Request $request)
    {
        # Por ahora todo irá a una misma solicitud...
        $archive = Archive::find(1);

        # Archivo de la solicitud
        $ruta = $request->file('file')->storeAs(
            'archives/'.$archive->id, 
            $request->requiredDocumentId
        );

        $archive->requiredDocuments()->detach($request->requiredDocumentId);
        $archive->requiredDocuments()->attach($request->requiredDocumentId, [
            'location' => $ruta
        ]);

        return new JsonResponse(
            $archive->requiredDocuments()
            ->select('required_documents.*','archive_required_document.location as location')
            ->where('id', $request->requiredDocumentId)
            ->first()
        );
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actualizaSolicitud(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function otorgaCartaIntencion(Request $request)
    {
        dd(1);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function otorgaCartaRecomendacion(Request $request)
    {
        dd(1);
    }
}
