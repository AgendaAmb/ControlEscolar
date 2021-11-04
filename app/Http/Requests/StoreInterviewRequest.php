<?php

namespace App\Http\Requests;

use App\Rules\RoomRule;
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
        if ($this->user()->hasAnyRole(['admin','control_escolar']))
            return true;

        return false;
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
            'date' => ['required','date'],
            'start_time' => ['required','date_format:H:i'],
            'end_time' => ['required','date_format:H:i','after:start_time'],
            'period_id' => ['required','exists:periods,id','exclude'],
            'room_id' => ['required','numeric','exists:rooms,id', new RoomRule($this->date, $this->start_time)]
        ]; 
    }
}
