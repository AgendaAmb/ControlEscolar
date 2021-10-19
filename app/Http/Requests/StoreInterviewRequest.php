<?php

namespace App\Http\Requests;

use App\Rules\UserExists;
use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewRequest extends FormRequest
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
            'user_type' => ['required','string','in:students,workers,externs'],
            'user_id' => ['required','numeric', new UserExists($this->user_type)],
            'period_id' => ['required','exists:periods,id'],
            'date' => ['required','date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'room_id' => ['required','numeric','exists:rooms,id']
        ]; 
    }
}
