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
            'degree' => ['nullable', 'string'],
            'degree_type' => ['nullable', 'string'],
            'cvu' => ['nullable', 'numeric'],
            'cedula' => ['nullable', 'numeric'],
            'country' => ['nullable', 'string'],
            'university' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'average' => ['nullable', 'numeric'],
            'min_avg' => ['nullable', 'numeric'],
            'max_avg' => ['nullable', 'numeric'],
            'knowledge_card' => ['nullable', 'string'],
        ];
    }
}
