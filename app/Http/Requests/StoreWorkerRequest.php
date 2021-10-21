<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkerRequest extends FormRequest
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
            'id' => ['required','numeric', Rule::unique('users')->where('type',$this->type)],
            'type' => ['required','in:workers,students'],
            'selected_roles' => ['required', 'array'],
            'selected_academic_areas' => ['required', 'array'],
            'selected_academic_entities' => ['required', 'array'],
            'selected_academic_comittes' => ['required', 'array'],
            
            'selected_roles.*' => ['required', 'numeric','exists:roles,id'],
            'selected_academic_areas.*' => ['required', 'numeric','exists:academic_areas,id'],
            'selected_academic_entities.*' => ['required', 'numeric','exists:academic_entities,id'],
            'selected_academic_comittes.*' => ['required', 'numeric','exists:academic_comittes,id'],
        ];
    }
}
