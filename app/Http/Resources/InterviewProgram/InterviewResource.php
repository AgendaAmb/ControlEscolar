<?php

namespace App\Http\Resources\InterviewProgram;

use App\Http\Resources\Calendar\UserResource;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class InterviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $room = Room::find($this->room_id);
        $appliant = $this->appliant->first() ?? null;
        $archive = $appliant->latestArchive->id ?? null;
        $academic_program = $appliant->latestArchive->announcement->academicProgram ?? null;

        //  aqui batallando :v 
        if($request->user()->hasRole('comite_academico')){
            return [
                'user_id' => $appliant->id,
                'appliant' => $this->when($appliant !== null, implode(' ', [
                    $appliant->name,
                    $appliant->middlename,
                    $appliant->surname
                ])),
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'academic_program' => $academic_program->name,
                'archive_url' => $this->when($archive !== null, route('solicitud.show', $archive)),
                'site' => $room->site
            ];
        }

        return [
            'id' => $this->id,
            'appliant' => $this->when($appliant !== null, implode(' ', [
                $appliant->name,
                $appliant->middlename,
                $appliant->surname
            ])),
            'archive_url' => $this->when($archive !== null, route('solicitud.show', $archive)),
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'room_id' => $this->room_id,
            'rubrics' => RubricPreviewResource::collection($this->evaluationRubrics),
            'site' => $room->site ?? 'Sala'
        ];
    }
}
