<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHumanCapitalRequest extends FormRequest
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
            'course_name' => ['nullable','required_if:state,Completo','string'],
            'assisted_at' => ['nullable','required_if:state,Completo','date'],
            'scolarship_level' => ['nullable','required_if:state,Completo','string'],
        ];
    }
}
