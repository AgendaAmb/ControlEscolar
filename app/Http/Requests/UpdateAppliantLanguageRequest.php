<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppliantLanguageRequest extends FormRequest
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
            'id' => ['required','exists:appliant_languages,id'],
            'archive_id' => ['required','exists:academic_degrees,archive_id'],
            'state' => ['required', 'in:Incompleto,Completo'],
            'language' => ['nullable', 'required_if:state,Completo','string'],
            'institution' => ['nullable', 'required_if:state,Completo','string'],
            'score' => ['nullable', 'required_if:state,Completo', 'numeric'],
            'presented_at' => ['nullable', 'required_if:state,Completo', 'date'],
            'valid_from' => ['nullable', 'required_if:state,Completo', 'date'],
            'valid_to' => ['nullable', 'required_if:state,Completo', 'date'],
            'language_domain' => ['nullable', 'required_if:state,Completo', 'string'],
            'conversational_level' => ['nullable', 'required_if:state,Completo', 'string'],
            'reading_level' => ['nullable', 'required_if:state,Completo', 'string'],
            'writing_level' => ['nullable', 'required_if:state,Completo', 'string'],
        ];
    }
}
