<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    /**
     * Send a JSON response for any failed validation.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        //
        //return

        $code = JsonResponse::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException(

            # Respuesta de error
            response()->json([
                'errors' => $validator->errors()->toArray()
            ],

            # Código de error
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ));
    }

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
     * Prepare data for validation.
     */
    protected function prepareForValidation()
    {
        # La petición pasará por oauth2.
        if (!$this->session()->has('state'))
        {
            $this->merge(['state' => null, 'code' => null]);
            $this->session()->put('state', Str::random(40));
        }

        # La petición ya pasó por oauth2.
        else if ($this->session()->has('state'))
        {
            $session_state = $this->session()->pull('state') ?? null;
            $this->merge(['session_state' => $session_state]);
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
            'session_state' => ['nullable'],
            'state' => ['nullable','required_unless:session_state,null','same:session_state'],
            'code' => ['nullable','required_unless:session_state,null'],
        ];
    }
}
