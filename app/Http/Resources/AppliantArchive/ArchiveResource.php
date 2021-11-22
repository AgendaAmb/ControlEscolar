<?php

namespace App\Http\Resources\AppliantArchive;

use Illuminate\Http\Resources\Json\JsonResource;

class ArchiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        # Nombre completo del postulante
        $name = implode(' ', [
            $this->appliant->name ?? '',
            $this->appliant->middlename ?? '',
            $this->appliant->surname ?? '',
        ]);
        
        return [
            'id' => $this->id,
            'name' => $name,
            'academic_program' => $this->announcement->academicProgram->name ?? '',
            'location' => route('solicitud.show', $this->id)
        ];
    }
}
