<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArchiveRequest;
use App\Models\AcademicProgram;
use App\Models\RequiredDocument;
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
        ->with('academic_program', $academic_program)
        ->with('personal_documents', RequiredDocument::type('personal')->get())
        ->with('bachelor_documents', RequiredDocument::type('academic-lic')->get())
        ->with('master_documents', RequiredDocument::type('academic-mast')->get()
        )/*->with('entrance_documents', $academic_program->requiredDocuments()->type('entrance')->get()
        )->with('curricular_documents', $academic_program->requiredDocuments()->type('curricular')->get()
        )*/;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subirCartaIntencion(Request $request, $academicProgramName)
    {
        $academic_program = AcademicProgram::firstWhere('alias', $academicProgramName);

        return view(
            'carta-intencion.'.self::ACADEMIC_PROGRAM_VIEWS[$academicProgramName]

        )->with('academic_program', $academic_program
        )->with('personal_documents', $academic_program->requiredDocuments()->type('personal')->get()
        )->with('academic_documents', $academic_program->requiredDocuments()->type('academic')->get()
        )->with('entrance_documents', $academic_program->requiredDocuments()->type('entrance')->get()
        )->with('curricular_documents', $academic_program->requiredDocuments()->type('curricular')->get()
        );
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
    public function actualizaSolicitud(UpdateArchiveRequest $request)
    {
        dd(1);
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
