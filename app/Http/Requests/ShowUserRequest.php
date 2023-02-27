<?php

namespace App\Http\Requests;

use App\Rules\UserExists;
use Illuminate\Foundation\Http\FormRequest;

class ShowUserRequest extends FormRequest
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
            'type' => ['required','string','in:students,workers,externs'],
            'id' => ['required','numeric', new UserExists($this->user_type)],
        ];
    }
}
