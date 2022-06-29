<?php

namespace App\Http\Requests;

use App\Rules\UniqueAreaInterviewRule;
use App\Rules\UniqueUserInterviewRule;
use Illuminate\Foundation\Http\FormRequest;

class NewInterviewUserRequest extends FormRequest
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
            'user_id' => ['required','numeric','exists:users,id'],
            'user_type' => ['required','string','in:workers'],
            'interview_id' => [
                'required','numeric','exists:interviews,id', 
                new UniqueUserInterviewRule($this->user_id, $this->user_type) 
                // new UniqueAreaInterviewRule($this->user_id, $this->user_type)    // Asi se requiere ahorita en 2022
            ],
        ];
    }
}
