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
     * Sets the interviews from the authenticated user or
     * if it's admin, returns all the interviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setInterviews($request)
    {
        $user_interviews = $this->resource->with([
            'evaluationRubrics' => function($query) use ($request){
                if ($request->user()->hasRole('admin'))
                    return;

                $query->where('user_id', $request->user()->id)
                    ->where('user_type', $request->user()->type);

            },'appliant'
        ])->get();
        
        $this->interviews = $user_interviews->map(function($interview) use ($request){

            # Obtiene las rúbricas de evaluación
            $rubrics = $interview->evaluationRubrics->map(function ($rubric){
                return route('entrevistas.rubrica.show', $rubric);
            })->toArray();

            # Devuelve la información como arreglo
            return [
                'id' => $interview->id,
                'appliant' => Str::lower($this->getInterviewAppliant($request, $interview)),
                'date' => $interview->date,
                'start_time' => $interview->start_time,
                'end_time' => $interview->end_time,
                'room_id' => $interview->room_id,
                'rubrics' => $rubrics
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
     * Sets the appliant name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setUser($request)
    {
        $worker = $request->session()->get('user');

        # Toma los datos de los trabajadores, que fueron recuperados del sistema
        # central.
        $this->user = $request->session()->get('workers')->firstWhere('id', $worker->id);
        $this->user['roles'] = $worker->roles->toArray();
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
        $this->setUser($request);

        return [
            'interviews' => $this->interviews->toArray(),
            'user' => $this->user,
        ];
    }
}
