<?php

namespace App\Http\Resources\InterviewProgram;

use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class RubricPreviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'location' => route('entrevistas.rubrica.show', $this),
            'user' => (new UserResource($this->professor))->toArray($request)
        ];
    }
}
