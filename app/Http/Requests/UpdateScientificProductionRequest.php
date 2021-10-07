<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateScientificProductionRequest extends FormRequest
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
            'id' => ['required','exists:scientific_productions,id'],
            'archive_id' => ['required', 'exists:archives,id'],
            'type' => ['required', 'in:articles,published_books,published_chapters,technical_reports,working_documents,working_memories,reviews'],
            'state' => ['required', 'in:Incompleto,Completo'],
            'title' => ['nullable', 'required_if:state,Completo','string'],
            'publish_date' => ['nullable', 'required_if:Completo,string'],
            'post_title' => ['nullable', Rule::requiredIf($this->state === 'Completo' || $this->type === 'working_documents' || $this->type === 'working_memories')],
            'institution' => ['nullable', Rule::requiredIf($this->state === 'Completo' || $this->type === 'technical_reports')],
            'article_name' => ['nullable', Rule::requiredIf($this->state === 'Completo' || $this->type === 'published_chapters')],
            'magazine_name' => ['nullable', Rule::requiredIf($this->state === 'Completo' || $this->type === 'articles')],
        ];
    }
}