<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkingExperienceRequest extends FormRequest
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
            'id' => ['required','exists:working_experiences,id'],
            'archive_id' => ['required','exists:archives,id'],
            'state' => ['required', 'in:Incompleto,Completo'],
            'institution' => ['nullable', 'required_if:state,Completo'],
            'working_position' => ['nullable', 'required_if:state,Completo', 'in:Catedrático,Investigador,Otro', 'string'],
            'from' => ['nullable', 'required_if:state,Completo', 'date'],
            'to' => ['nullable', 'required_if:state,Completo', 'date'],
            'knowledge_area' => ['nullable', 'required_if:state,Completo', 'string'],
            'field' => ['nullable', 'required_if:state,Completo', 'string'],
            'working_position_description' => ['nullable', 'required_if:state,Completo', 'string'],
            'achievements' => ['nullable', 'required_if:state,Completo', 'string'],
        ];
    }
}
