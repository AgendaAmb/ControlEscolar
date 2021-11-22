<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Resources\Json\JsonResource;

class AppliantResource extends JsonResource
{
    /**
     * Profesor que otorgó la carta de intención
     * 
     * @var App\Models\User $professor
     */
    private $professor;

    /**
     * Construye el serializer
     *
     * @param resource
     * @param App\Models\User $professor
     */
    public function __construct($resource, $professor)
    {
        parent::__construct($resource);
        $this->professor = $professor;
    }


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $name = implode(' ', [
            $this->name,
            $this->namemiddlename,
            $this->surname,
        ]);

        return [
            'id' => $this->id,
            'type' => $this->user_type,
            'name' => $name,
            'intention_letter_professor' => (new IntentionLetterProfessorResource($this->professor))->toArray($request)
        ];
    }
}
