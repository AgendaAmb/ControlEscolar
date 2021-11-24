<?php

namespace App\Http\Resources\Calendar;

use App\Http\Resources\Calendar\AppliantResource;
use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class InterviewCalendarResource extends JsonResource
{
    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request $request
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

        $name = implode(' ', [
            $miPortal_user['name'] ?? '',
            $miPortal_user['middlename'] ?? '',
            $miPortal_user['surname']  ?? ''
        ]);

        return [
            'id' => $miPortal_user['id']  ?? '',
            'type' => $miPortal_user['user_type']  ?? '',
            'name' => $name
        ];
    }

    /**
     * Maps an appliant from the main system.
     *
     * @param $archive
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function mapArchiveAppliant($archive, $request)
    {
        return (new AppliantResource(
            $archive->appliant, 
            $archive->intentionLetter->professor ?? []

        ))->toArray($request);
    }

    /**
     * Maps an academic area.
     *
     * @param $area
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function mapAcademicArea($area, $request)
    {
        $miPortal_professor = $this->getMiPortalUser($request, $area['professor_id'], 'workers'); 
            
        return [
            'id' => $area['area_id'],
            'name' => $area['area_name'],
            'professor_name' => Str::lower($miPortal_professor['name'])
        ];
    }

    /**
     * Sets the available announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setAnnouncements($request)
    {
        $this->announcements = $this->map->latestAnnouncement;
    }
    
    /**
     * Sets the available announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setInterviewAppliant($request, &$interview)
    {
        $interview['appliant'] = $this->getMiPortalUser(
            $request, $interview['appliant'][0]['id'], 'appliants'
        );
    }

    /**
     * Sets the available announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setIntentionLetterProfessor($request, &$interview)
    {
        $interview['intention_letter_professor'] = $interview['intention_letter_professor'][0] ?? [];
        $miPortal_worker = collect($request
            ->session()
            ->get('workers'))
            ->firstWhere('id', $interview['intention_letter_professor']['id']);

        if ($miPortal_worker !== null)
        {
            $interview['intention_letter_professor'] = [
                'id' => $miPortal_worker['id'],
                'type' => $miPortal_worker['user_type'],
                'name' => implode(' ', [
                    $miPortal_worker['name'],
                    $miPortal_worker['middlename'],
                    $miPortal_worker['surname']
                ])
            ];
        }
    }

    /**
     * Sets the available announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setInterviewAcademicAreas($request, &$interview)
    {
        # Llena la información de los usuarios que participan en 
        # la entrevista.
        $areas = collect($interview['academic_areas'])->map(
            fn($area) => $this->mapAcademicArea($area, $request)
        )->toArray();


        # Verifica si la cantidad de áreas académicas es igual a 5.
        # En caso de que no sea así, se llena el arreglo de datos con 5
        # áreas académicas vacías.
        if (count($areas) < 5)
        {
            $empty_areas = array_fill(0, 5 - count($areas), [
                'name' => 'Área académica disponible',
                'professor_name' => false
            ]);

            $areas = array_merge($areas, $empty_areas);
        }

        # Asocia las áreas con la entrevista.
        $interview['academic_areas'] = $areas;
    }

    /**
     * Sets the available period.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setPeriod($request)
    {
        # Filtra el primer periodo no nulo.
        $this->period = $this->resource->filter(function($academic_program){
            return $academic_program->periods->count() > 0;
        
        })->map(fn($academic_program) => $academic_program->periods->first())->first();

        # Carga los modelos asociados al periodo y quita las convocatorias.
        if ($this->period === null)
            return; 
            
        $this->announcements = null;
        $this->period->interviews = $this->period->interviews->filter(function($interview){
            return $interview->intentionLetterProfessor->count() > 0;
        })->map(function($interview) use ($request){
            $interview = $interview->toArray();

            $this->setInterviewAppliant($request, $interview);
            $this->setIntentionLetterProfessor($request, $interview);
            $this->setInterviewAcademicAreas($request, $interview);

            return $interview;
        })->toArray();

        $this->period = [
            'id' => $this->period->id,
            'announcement' => $this->period->announcement,
            'start_date' => $this->period->start_date,
            'end_date' => $this->period->end_date,
            'interviews' => $this->period->interviews,
            'rooms' => $this->period->rooms,
        ];

        $this->period['rooms'] = $this->period['rooms']->toArray();
    }

    /**
     * Sets the appliant name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setAppliants($request)
    {
        # Verifica que el periodo exista.
        if ($this->period === null)
            return;

        # Toma a los postulantes y filtra los datos del sistema central.
        $archives = $this->period['announcement']->archives;
        $this->appliants = $archives->filter(
            fn($archive) => $archive->appliant !== null
        )->map(
            fn($archive) => $this->mapArchiveAppliant($archive, $request)
        )->values()->toArray();
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        



        $this->setAnnouncements($request);
        $this->setPeriod($request);
        $this->setAppliants($request);

        return [
            'appliants' => $this->appliants ?? null,
            'announcements' => $this->announcements,
            'user' => (new UserResource($request->user()))->toArray($request),
            'period' => $this->period,
        ];
    }
}
