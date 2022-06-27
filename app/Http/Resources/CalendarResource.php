<?php

namespace App\Http\Resources;

use App\Http\Resources\Calendar\AppliantResource;
use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Helpers\MiPortalService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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

    private $service;

    /**
     * Construye el serializer
     *
     * @param resource
     * @param App\Models\User $professor
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->service = new MiPortalService;
    }

    // Funcion para obtener los datos de un usuario de basde de datos de mi portal
    private function getMiPortalUser($request, int $id, string $type)
    {
        try {
            $miPortal_user =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $id])->collect();
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
        }

        $user = User::find($id);

        $name = implode(' ', [
            $miPortal_user['name'] ?? '',
            $miPortal_user['middlename'] ?? '',
            $miPortal_user['surname']  ?? ''
        ]);
        
        return [
            'id' => $miPortal_user['id']  ?? '',
            'type' => $user->type  ?? '',
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
        // $service = new MiPortalService;
        $miPortal_user = $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->user_id])->collect();
        $miPortal_user = $miPortal_user[0];

        $user = User::find($archive->user_id);

        $intention_letter_professor  = [
            'id' => '-1',
            'type' => '',
            'name' => ''
        ];

        if(isset($archive->intentionLetter->user_id)){
            try {
                $miPortal_professor = $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->intentionLetter->user_id])->collect();
            } catch (\Exception $e) {
                return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
            }

            $miPortal_professor = $miPortal_professor[0];

            // Cargar los datos del profesor 
            $professor = User::find($archive->intentionLetter->user_id);

            $intention_letter_professor['id'] = $miPortal_professor['id'] ?? '';
            $intention_letter_professor['type'] = $professor->type ?? '';           
            $intention_letter_professor['name'] = implode(' ', [
                $miPortal_professor['name'] ?? '',
                $miPortal_professor['middlename'] ?? '',
                $miPortal_professor['surname']  ?? ''
            ]);
        }

        return [
            'id' => $miPortal_user['id']  ?? '',
            'type' => $user->type ?? '',
            'name' => implode(' ', [
                $miPortal_user['name'] ?? '',
                $miPortal_user['middlename'] ?? '',
                $miPortal_user['surname']  ?? ''
            ]),
            'intention_letter_professor' => $intention_letter_professor
        ];
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
        try {
            $miPortal_user =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $area['professor_id']])->collect();
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
        }

        $miPortal_user = $miPortal_user[0];

        $name = implode(' ', [
            $miPortal_user['name'] ?? '',
            $miPortal_user['middlename'] ?? '',
            $miPortal_user['surname']  ?? ''
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
        try {
            $miPortal_user =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $interview['appliant'][0]['id']])->collect();
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
        }

        $miPortal_user = $miPortal_user[0];

        $user = User::find($interview['appliant'][0]['id']);
        
        // $name = implode(' ', [
        //     $miPortal_user['name'] ?? '',
        //     $miPortal_user['middlename'] ?? '',
        //     $miPortal_user['surname']  ?? ''
        // ]);

        // $interview['appliant'] = $miPortal_user;
        // $interview['appliant']['name'] = $name;

        $interview['appliant'] = [
            'id' => $miPortal_user['id'] ?? '',
            'type' => $user->type ?? '',
            'name' => implode(' ', [
                $miPortal_user['name'] ?? '',
                $miPortal_user['middlename'] ?? '',
                $miPortal_user['surname'] ?? ''
            ])
        ];
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

        // Recursos para extrer los datos de mi portal  
        // $service = new MiPortalService;

        try {
            $miPortal_worker =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $id])->collect();
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
        }

        $miPortal_worker = $miPortal_worker[0];

        // Se necesita extrar el type con la base de datos de control escolar y no de portal
        $worker = User::find($id);

        if ($miPortal_worker !== null) {
            $interview['intention_letter_professor'] = [
                'id' => $miPortal_worker['id'] ?? '',
                'type' => $worker->type ?? '',
                'name' => implode(' ', [
                    $miPortal_worker['name'] ?? '',
                    $miPortal_worker['middlename'] ?? '',
                    $miPortal_worker['surname'] ?? ''
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
        # Filtra el primer periodo no nulo para el programa academico
        $this->period = $this->resource->filter(function ($academic_program) {
            return $academic_program->periods->count() > 0;
        })->map(fn ($academic_program) => $academic_program->periods->first())->first();

        # Carga los modelos asociados al periodo y quita las convocatorias.
        if ($this->period === null)
            return;

        $this->announcements = null;

        // Descarta las entrevistas que no tienen cartas de intencinon
        $this->period->interviews = $this->period->interviews->filter(function ($interview) {
            $interview = $interview->toArray();
            return isset($interview['intention_letter_professor']) && $interview['appliant'][0]['id'];
        // Para cada entrevista...
        })->map(function ($interview) use ($request) {
            $interview = $interview->toArray();
            // Se incorporan los datos del postulante
            $this->setInterviewAppliant($request, $interview);
            // Se incorpora los datos del profesor que entrego la carta de intencion al postulante
            $this->setIntentionLetterProfessor($request, $interview);
            // Se incorporan las areas academicas de la entrevista
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

        // Verificamos que existan datos del postulante y datos del profesor que otorgo la carta de intención
        $this->appliants = $archives->filter(function($archive){
            $archive = $archive->toArray();
            return $archive['appliant'] != null && $archive['intention_letter'] != null;
        })->filter(
            // Fitramos solo aquellos donde el status sea igual a 5 o 7 (Aprovados y excepción)
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
