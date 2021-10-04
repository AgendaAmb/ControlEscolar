<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequiredDocumentFileRequest;
use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Models\RequiredDocument;
use App\Repositories\RequiredDocumentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Monolog\Handler\NewRelicHandler;

class ArchiveController extends Controller
{
    /**
     * Repositorio de documentos requeridos.
     * 
     * @var RequiredDocumentRepository
     */
    private $req_docs_repo;

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
     * Crea el controlador.
     */
    public function __construct()
    {
        $this->req_docs_repo = new RequiredDocumentRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postulacion(Request $request, $academicProgramName)
    {
        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);
        $required_documents = $this->req_docs_repo->allFrom(Archive::find(1));
        
        return view('postulacion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName])
        ->with('archive', Archive::find(1))
        ->with('academic_program', $academic_program)
        ->with('personal_documents', $required_documents[0])
        ->with('bachelor_documents', $required_documents[1])
        ->with('master_documents', $required_documents[2])
        ->with('language_documents', $required_documents[3])
        ->with('entrance_documents', $required_documents[4]);
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
}