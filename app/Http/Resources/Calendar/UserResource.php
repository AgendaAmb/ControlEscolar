<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

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
        $miPortal_user = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $this->id]);         // $miPortal_user[0]->id;
        $miPortal_user = $miPortal_user[0];

        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $miPortal_user->name,
            'middlename' => $miPortal_user->middlename,
            'surname' => $miPortal_user->surname,
            'email' => $miPortal_user->email,
            'roles' => $this->roles,
            // 'user_type' => $this->user_type,
            'user_type' => $this->type
        ];
    }
}
