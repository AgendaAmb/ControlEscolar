<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
            'announcement_id' => ['required','numeric','exists:announcements,id', 'unique:periods,announcement_id'],
            'start_date' => ['required','date','before:end_date'],
            'end_date' => ['required','date'],
            'num_salas' => ['required', 'numeric'],
        ];
    }
}
