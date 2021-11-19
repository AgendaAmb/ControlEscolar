<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Resources\Json\JsonResource;

class IntentionLetterProfessorResource extends JsonResource
{
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
            $this->middlename,
            $this->surname,
        ]);

        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $name
        ];
    }
}
