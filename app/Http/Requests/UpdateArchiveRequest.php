<?php

namespace App\Http\Requests;

use App\Models\AcademicProgram;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateArchiveRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        # Obtiene el programa académico.
        $academic_program = AcademicProgram::find($this->academicProgram);

        # No se sanitiza nada, en caso de que el programa no exista.
        if ($academic_program === null)
            return;

        # Documentos que solo puede subir el aspirante.
        $required_document_keys = $academic_program
        ->requiredDocuments()
        ->whereNotIn('id', [17, 20, 21]);

        /*
        if ($this->user()->hasRole('ASPIRANTE EXTRANJERO'))
            $required_document_keys = $required_document_keys
            ->whereNotIn('id', [2, 3, 12, 13, 14])
            ->pluck('id');
        else
        */
            $required_document_keys = $required_document_keys->pluck('id');


        # Obtiene las claves de aquellos documentos que el postulante no debería
        # de haber subido.
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'academicProgram' => ['required','exists:academic_programs,id'],
            'Documents.*' => ['nullable', 'file','mimes:pdf'],
        ];
    }
}
