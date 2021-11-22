<?php

namespace App\Http\Resources\InterviewProgram;

use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewProgramResource extends JsonResource
{
    /**
     * Sets the interviews from the authenticated user or
     * if it's admin, returns all the interviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function getInterviews($request)
    {
        $user_interviews = $this->resource->with([
            'evaluationRubrics' => function($query) use ($request){
                if ($request->user()->hasRole('admin'))
                    return;

                $query->where('user_id', $request->user()->id)
                    ->where('user_type', $request->user()->user_type);

            },'appliant'
        ])->get();


        return InterviewResource::collection($user_interviews)->groupBy([
            'date', fn($item) => $item['room_id']
        ], true);
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
            'interviews' => $this->getInterviews($request),
            'user' => new UserResource($request->user()),
        ];
    }
}
