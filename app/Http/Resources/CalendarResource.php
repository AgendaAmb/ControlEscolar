<?php

namespace App\Http\Resources;

use App\Http\Resources\Calendar\AppliantResource;
use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Models\AcademicProgram;
use App\Helpers\MiPortalService;

class CalendarResource extends JsonResource
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
        $service = new MiPortalService;
        $miPortal_user =  $service->miPortalGet('api/usuarios', ['filter[id]' => $id])->collect();

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

        $service = new MiPortalService;
        $miPortal_user =  $service->miPortalGet('api/usuarios', ['filter[id]' => $area['professor_id']])->collect();

        $name = implode(' ', [
            $miPortal_user[0]['name'] ?? '',
            $miPortal_user[0]['middlename'] ?? '',
            $miPortal_user[0]['surname']  ?? ''
        ]);

        return [
            'id' => $area['area_id'],
            'name' => $area['area_name'],
            'professor_name' => Str::lower($name)
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
        $service = new MiPortalService;
        $miPortal_user =  $service->miPortalGet('api/usuarios', ['filter[id]' => $interview['appliant'][0]['id']])->collect();

        $name = implode(' ', [
            $miPortal_user[0]['name'] ?? '',
            $miPortal_user[0]['middlename'] ?? '',
            $miPortal_user[0]['surname']  ?? ''
        ]);

        $interview['appliant'] = [
            'id' => $miPortal_user[0]['id']  ?? '',
            'type' => $miPortal_user[0]['user_type']  ?? '',
            'name' => $name
        ];

        // $interview['appliant'] = $this->getMiPortalUser(
        //     $request,
        //     $interview['appliant'][0]['id'],
        //     'appliants'
        // );
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
        $id = $interview['intention_letter_professor']['id'];

        $service = new MiPortalService;
        $miPortal_worker =  $service->miPortalGet('api/usuarios', ['filter[id]' => $id])->collect();

        // $miPortal_worker = collect($request
        //     ->session()
        //     ->get('workers'))
        //     ->firstWhere('id', $interview['intention_letter_professor']['id']);

        if ($miPortal_worker[0] !== null) {
            $interview['intention_letter_professor'] = [
                'id' => $miPortal_worker[0]['id'] ?? '',
                'type' => $miPortal_worker[0]['user_type'] ?? '',
                'name' => implode(' ', [
                    $miPortal_worker[0]['name'] ?? '',
                    $miPortal_worker[0]['middlename'] ?? '',
                    $miPortal_worker[0]['surname'] ?? ''
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
        if (count($areas) < 5) {
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
        $this->period = $this->resource->filter(function ($academic_program) {
            return $academic_program->periods->count() > 0;
        })->map(fn ($academic_program) => $academic_program->periods->first())->first();

        # Carga los modelos asociados al periodo y quita las convocatorias.
        if ($this->period === null)
            return;

        $this->announcements = null;

        $this->period->interviews = $this->period->interviews->filter(function ($interview) {
            return $interview->intentionLetterProfessor->count() > 0;
        })->map(function ($interview) use ($request) {
            $interview = $interview->toArray();

            $this->setInterviewAppliant($request, $interview);
            $this->setIntentionLetterProfessor($request, $interview);
            $this->setInterviewAcademicAreas($request, $interview);

            return $interview;
        })->toArray();

        $academic_program = AcademicProgram::where('id', $this->period->announcement->academic_program_id)->first();

        $this->period = [
            'actual_program' =>  isset($academic_program) ? $academic_program->name : "",
            'id' => $this->period->id,
            'announcement' => $this->period->announcement,
            'start_date' => $this->period->start_date,
            'end_date' => $this->period->end_date,
            'interviews' => $this->period->interviews,
            'virtual_rooms' => $this->period->rooms->filter(function ($room) {
                return str_contains($room->site, 'Zoom') ? $room : false;
            })->values(),
            'rooms' => $this->period->rooms->filter(function ($room) {
                return str_contains($room->site, 'Zoom') ? false : $room;
            })->values(),
            'modality' => $this->period->modality
        ];
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
            return; //return no se puede

        # Toma a los postulantes y filtra los datos del sistema central.
        $archives = $this->period['announcement']->archives;

        $this->appliants = $archives->filter(
            fn ($archive) => $archive->appliant !== null
        )->filter(
            // Fitramos solo aquellos donde el status sea igual a 5 o 7 
            fn ($archive) => ($archive->status === 5 || $archive->status === 7)
        )->map(
            fn ($archive) => $this->mapArchiveAppliant($archive, $request)
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
