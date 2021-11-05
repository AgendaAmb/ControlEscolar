<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveInterviewUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasAnyRole(['profesor_nb','admin']);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required','numeric','exists:users,id'],
            'user_type' => ['required','string','in:workers'],
            'interview_id' => ['required','numeric','exists:interviews,id'],
        ];
    }
}
