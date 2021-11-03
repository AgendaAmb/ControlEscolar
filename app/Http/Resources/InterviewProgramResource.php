<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class InterviewProgramResource extends JsonResource
{
    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param string $type
     * @return void
     */
    private function getMiPortalUser($request, int $id, string $type)
    {
        $miPortal_user = collect($request
            ->session()
            ->get($type))
            ->firstWhere('id', $id);

        $name = implode(' ', [$miPortal_user['name'],$miPortal_user['middlename'],$miPortal_user['surname']]);

        return [
            'id' => $miPortal_user['id'],
            'type' => $miPortal_user['user_type'],
            'name' => $name
        ];
    }

    /**
     * Gets the interview appliant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function getInterviewAppliant($request, $interview)
    {
        $appliant = $interview->appliant->first();
        $appliant = $this->getMiPortalUser($request, $appliant->id, 'appliants');
        
        return $appliant['name'];
    }

    /**
     * Gets the list of interviews from the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setInterviews($request)
    {
        $user_interviews = $this->resource->with([
            'evaluationRubrics' => function($query) use ($request){
                $query->where('user_id', $request->user()->id)
                    ->where('user_type', $request->user()->type);

            },'appliant'
        ])->get();
        
        $this->interviews = $user_interviews->map(function($interview) use ($request){
            $rubric = $interview->evaluationRubrics->first();
            
            return [
                'id' => $interview->id,
                'rubric' => route('entrevistas.rubrica.show', $rubric),
                'appliant' => Str::lower($this->getInterviewAppliant($request, $interview)),
                'date' => $interview->date,
                'start_time' => $interview->start_time,
                'end_time' => $interview->end_time,
                'room_id' => $interview->room_id,
            ];
        
        })->groupBy(['date', function($item) {
            return $item['room_id'];
        
        }], $preserveKeys = true)->map(function($rooms, $date){
            return $rooms->map(function($room, $room_id){
                return $room->values()->toArray();
            });
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->setInterviews($request);

        return $this->interviews->toArray();
    }
}
