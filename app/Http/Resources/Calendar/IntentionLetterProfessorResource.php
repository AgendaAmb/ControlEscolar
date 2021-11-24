<?php

namespace App\Http\Resources\Calendar;


class IntentionLetterProfessorResource extends UserResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'id' => $this->id ?? -1,
            'type' => $this->type ?? 'undefined',
            'name' => $this->getFullName() ?? 'Indefinido'
        ];
        
    }
}
