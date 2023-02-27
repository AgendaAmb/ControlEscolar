<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicDegreeRequest extends FormRequest
{
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
            'id' => ['required','exists:academic_degrees,id'],
            'archive_id' => ['required','exists:academic_degrees,archive_id'],
            'state' => ['required', 'in:Incompleto,Completo'],
            'status' => ['nullable', 'required_if:state,Completo', 'in:Pasante,Grado obtenido,Título o grado en proceso', 'string'],
            'degree' => ['nullable', 'required_if:state,Completo'],
            'degree_type' => ['nullable', 'required_if:state,Completo', 'in:Licenciatura,Maestría', 'string'],                
            'cvu' => ['nullable', 'required_if:degreeType,Maestría', 'numeric'],
            'cedula' => ['nullable','required_if:status,Grado obtenido'],
            'country' => ['nullable', 'required_if:state,Completo', 'string'],
            'university' => ['nullable', 'required_if:state,Completo', 'string'],
            'average' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'min_avg' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'max_avg' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'knowledge_card' => ['nullable','required_if:degreeType,Maestría', 'in:Si,No', 'string'],
            'digital_signature' => ['nullable','required_if:degreeType,Maestría', 'in:Si,No', 'string'],
            'titration_date' => ['nullable', 'required_if:state,Completo', 'date']
        ];
    }
}