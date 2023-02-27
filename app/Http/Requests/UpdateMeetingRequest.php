<?php

namespace App\Http\Requests;

use DateTime;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
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
     * Prepare input data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        try
        {
            $this->merge([
                'start_time' => (new DateTime($this->start_time))->format('Y-m-d\TH:i:s'),
            ]);
        }
        catch (Exception $ex)
        {
            $this->merge([
                'start_time' => null
            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'topic' => ['required','string'],
            'start_time' => ['required','date'],
            'duration' => ['required','numeric'],
            'agenda' => ['nullable','string'],
        ];
    }
}
