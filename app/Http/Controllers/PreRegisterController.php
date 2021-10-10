<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreRegisterRequest;
use App\Models\AcademicProgram;

class PreRegisterController extends Controller
{
    /**
     * Programas académicos a los cuales el postulante puede aplicar
     * 
     * @var Illuminate\Eloquent\Collection
     */
    private $academic_programs;

    /**
     * Construye al controlador y genera las dependencias requeridas.
     * 
     */
    public function __construct()
    {
        $this->academic_programs = AcademicProgram::all();
    }

    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function index()
    {
        return view('pre-registro.index')
            ->with('academic_programs', $this->academic_programs);
    }


    /**
     * Devuelve la vista principal de solicitudes académicas.
     */
    public function store(PreRegisterRequest $request)
    {
        $data = $request->validated();
    }
}
