<?php

namespace App\Http\Resources\InterviewProgram;

use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class InterviewProgramResource extends JsonResource
{
    /**
     * Sets the interviews from the authenticated user or
     * if it's admin, coordinador or ca, returns all the interviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function getInterviews($request)
    {
        $user_interviews = $this->resource->with([
            'evaluationRubrics' => function($query) use ($request){
                // * Regresamos todas las entrevistas
                if ($request->user()->hasRole('admin') || $request->user()->hasRole('coordinador')
                || $request->user()->hasRole('control_escolar')  || $request->user()->hasRole('comite_academico'))
                    return;
                
                // * Regresamos las entrevistas solo del profersor nb
                $query->where('user_id', $request->user()->id)
                    ->where('user_type', $request->user()->user_type);

            },'appliant'
        ])->get();

        
        return InterviewResource::collection($user_interviews);
    }   

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = new UserResource($request->user());
        return [
            'interviews' => $this->getInterviews($request),
            'user' => $user,
        ];
    }
}
