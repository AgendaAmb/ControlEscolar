<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationLetter extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'recommendation_letter_id' => ['required'],
            'answer' => ['required'],
            'token' => ['required','string', 'max:255'],
            'archive_id' => ['required','exists:archives,id'],
            'email_evaluator'=>['required','email','max:255'],
            'time_to_meet' => ['required', 'string', 'max:255'],
            'how_meet' => ['required', 'string', 'max:255'],
            'kind_relationship' => ['required', 'string', 'max:255'],
            'experience_with_candidate' => ['required', 'string', 'max:255'],
            'qualifications_students' => ['required', 'string', 'max:255'],
            'special_skills' => ['required', 'string', 'max:255'],
            'why_recommendation' => ['required', 'string', 'max:255'],

            /*
            Estos parametros son objetos por lo que se guardaran en un controlador separado
            safe -> except -> ()
            */
            'score_parameters'=> ['required','array'],

            'custom_parameters' => ['required','array']

            
        ];
    }


}
