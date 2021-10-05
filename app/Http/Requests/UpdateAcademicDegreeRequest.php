<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'degree' => ['nullable', 'required_if:state,Completo'],
            'degree_type' => ['nullable', 'required_if:state,Completo', 'in:Licenciatura,Maestría', 'string'],
            'cvu' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'cedula' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'country' => ['nullable', 'required_if:state,Completo', 'string'],
            'university' => ['nullable', 'required_if:state,Completo', 'string'],
            'status' => ['nullable', 'required_if:state,Completo', 'in:Pasante,Grado obtenido,Título o grado en proceso', 'string'],
            'average' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'min_avg' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'max_avg' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'knowledge_card' => ['nullable', 'required_if:state,Completo', 'string'],
        ];
    }
}
