<?php

namespace App\Http\Resources;

use App\Http\Resources\Calendar\AppliantResource;
use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PeriodResource extends JsonResource
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
            'appliants' => $this->appliants ?? null,
            'announcements' => $this->announcements,
            'user' => (new UserResource($request->user()))->toArray($request),
            'period' => $this->period,
        ];
    }
}
