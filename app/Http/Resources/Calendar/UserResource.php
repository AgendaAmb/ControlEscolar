<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Get the users full name
     *
     * @return string
     */
    protected function getFullName()
    {
       
            return implode(' ', [
                $this->name?? '',
                $this->middlename?? '',
                $this->surname?? '',
            ]);
       
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'middlename' => $this->middlename,
            'surname' => $this->surname,
            'email' => $this->email,
            'roles' => $this->roles,
            'user_type' => $this->user_type
        ];
    }
}
