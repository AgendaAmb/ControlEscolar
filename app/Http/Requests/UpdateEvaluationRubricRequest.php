<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluationRubricRequest extends FormRequest
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
            'state' => ['required','in:save,send'],
            'basic_concepts' => ['array'],
            'basic_concepts.*.id' => ['required','numeric','exists:evaluation_concepts,id'],
            'basic_concepts.*.score' => ['nullable','required_if:state,send','numeric'],
            'basic_concepts.*.notes' => ['nullable','max:600'],

            'academic_concepts' => ['array'],
            'academic_concepts.*.id' => ['required','numeric','exists:evaluation_concepts,id'],
            'academic_concepts.*.score' => ['nullable','required_if:state,send','numeric'],
            'academic_concepts.*.notes' => ['nullable','max:600'],

            'research_concepts' => ['array'],
            'research_concepts.*.id' => ['required','numeric','exists:evaluation_concepts,id'],
            'research_concepts.*.score' => ['nullable','required_if:state,send','numeric'],
            'research_concepts.*.notes' => ['nullable','max:600'],

            'working_experience_concepts' => ['array'],
            'working_experience_concepts.*.id' => ['required','numeric','exists:evaluation_concepts,id'],
            'working_experience_concepts.*.score' => ['nullable','required_if:state,send','numeric'],
            'working_experience_concepts.*.notes' => ['nullable','max:600'],

            'personal_attributes_concepts' => ['array'],
            'personal_attributes_concepts.*.id' => ['required','numeric','exists:evaluation_concepts,id'],
            'personal_attributes_concepts.*.score' => ['nullable','required_if:state,send','numeric'],
            'personal_attributes_concepts.*.notes' => ['nullable','max:600'],

            'considerations' => ['nullable','string','max:800'],
            'additional_information' => ['nullable','string','max:800'],
            'dictamen_ce' => ['nullable','string','max:800'],
            'dictamen_individual' => ['nullable', 'string', 'max:800'],
        ];
    }
}
