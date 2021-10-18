<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class InterviewAppliant extends JsonResource
{
    /**
     * Arreglo con el listado de profesores (inyección de dependencia)
     * 
     * @var \Illuminate\Support\Collection;
     */
    private $professors;


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $professor_resource = new IntentionLetterProfessor(null); 

        return [
            'id' => $this->id,
            'type' => $this->user_type,
            'email' => $this->email,
            'name' => $this->name,
            'middlename' => $this->middlename,
            'surname' => $this->surname,
            'intention_letter' => $this->intentionLetters->first()
        ];
    }
}
