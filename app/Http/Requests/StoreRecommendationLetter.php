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
            'recommendation_letter_id' => ['required','integer'],
            'answer' => ['required'],
            'token' => ['required','string', 'max:255'],
            'email_evaluator'=>['required','email','max:255'],
            'time_to_meet' => ['required', 'date', 'date_format:Y-m-d'],
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
            'custom_parameters' => ['array'],
            'appliant' => ['required'],
            'announcement' => ['required'],
            
        ];
    }
    
    public function messages()
    {
        return [
            'recommendation_letter_id.required'=> 'No existe la carta de recomendacion',
            'recommendation_letter_id.integer'=> 'Error en el tipo de dato de carta de recomendacion',
            'email_evaluator.required'=>'Se necesita saber el email del que contesta',
            'time_to_meet.required'=>'No se ha contestado la fecha desde la que conoce al estudiante',
            'how_meet.required'=>'No se ha contestado el como conocio al estudiante',
            'kind_relationship.required'=>'No se ha contestado la relacion que tiene al estudiante',
            'experience_with_candidate.required'=>'No se ha contestado la relacion que tiene al estudiante',
            'qualifications_students.required'=>'No se ha contestado como califica al estudiante en experiencias pasadas estudiante',
            'special_skills.required'=>'No se ha contestado las habilidades que reconoce del estudiante',
            'why_recommendation.required'=>'No se ha contestado el por que recomienda al estudiante',
            'score_parameters.required'=>'No se han contestado todos los campos de parametros estudiante',
        ];
    }


}
