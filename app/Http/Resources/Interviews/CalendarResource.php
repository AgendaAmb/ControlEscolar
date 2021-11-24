<?php

namespace App\Http\Resources\Interviews;

use App\Http\Resources\Calendar\AppliantResource;
use App\Models\AcademicProgram;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
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
            'period' => $this->when(
                $this->resource !== null, 
                $this->resource),
            'announcements' => $this->when(
                $this->resource === null, 
                AnnouncementResource::collection(AcademicProgram::with('latestAnnouncement')->get())),
            'appliants' => $this->when(
                $this->resource !== null,
                AppliantResource::collection($this->archives)
            )
        ];
    }
}
