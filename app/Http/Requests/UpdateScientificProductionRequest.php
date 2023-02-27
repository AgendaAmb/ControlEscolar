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
            'type' => ['required', 'in:articles,published_books,published_chapters,technical_reports,working_documents,working_memories,reviews_cp'],
            'state' => ['required', 'in:Incompleto,Completo'],
            'title' => ['nullable', 'required_if:state,Completo','string'],
            'publish_date' => ['nullable', 'required_if:state,Completo','string'],
            'post_title_document' => ['nullable', Rule::requiredIf($this->type == 'working_documents')],
            'post_title_review' => ['nullable', Rule::requiredIf($this->type == 'reviews_cp')],
            'post_title_memory' => ['nullable', Rule::requiredIf($this->type == 'working_memories')],
            'institution' => ['nullable', Rule::requiredIf($this->type == 'technical_reports')],
            'article_name' => ['nullable', Rule::requiredIf($this->type == 'published_chapters')],
            'magazine_name' => ['nullable', Rule::requiredIf($this->type == 'articles')],
        ];
    }
}