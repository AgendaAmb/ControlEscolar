<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AddScientificProductionAuthorRequest extends FormRequest
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
            'scientific_production_id' => ['required','exists:scientific_productions,id'],
            'archive_id' => ['required','exists:archives,id'],
            'type' => ['required','in:articles,published_books,published_chapters'],
            'name' => ['required','string'],
        ];
    }
}
