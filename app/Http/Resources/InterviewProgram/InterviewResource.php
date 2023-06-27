<?php

namespace App\Http\Resources\InterviewProgram;

use App\Http\Resources\Calendar\UserResource;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InterviewResource extends JsonResource
{

    // * Filter average rubric link by role
    public function setAverageRubric($request, $archive){
        $average_rubric_route = null;
        if( $request->user()->hasAnyRole(['admin','coordinador']) === true){
            $average_rubric_route = route('entrevistas.rubrica.show_average', ['archive_id' => $archive]);
        }else if($request->user()->hasAnyRole(['comite_academico', 'control_escolar']) === true){
            $average_rubric_route = route('entrevistas.rubrica.show_average_ca', ['archive_id' => $archive]);
        }
        return $average_rubric_route;
    }

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

        $miPortal_user = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $appliant->id]);         // $miPortal_user[0]->id;
        $miPortal_user = $miPortal_user[0];



        return [
            'id' => $this->id,
            'appliant' => $this->when($appliant !== null, implode(' ', [
                $miPortal_user->name,
                $miPortal_user->middlename,
                $miPortal_user->surname
            ])),
            'archive_url' => $this->when($archive !== null, route('solicitud.show', $archive)),
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'room_id' => $this->room_id,
            'rubrics' => RubricPreviewResource::collection($this->evaluationRubrics),
            'site' => $room->site ?? 'Sala',
            'academicprogram' => $academic_program->name,
            'type' => $academic_program->type,
            'average_rubric' => $this->setAverageRubric($request,$archive)
        ];
    }
}
