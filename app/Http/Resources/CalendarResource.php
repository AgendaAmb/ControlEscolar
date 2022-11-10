<?php

namespace App\Http\Resources;

use App\Http\Resources\Calendar\AppliantResource;
use App\Http\Resources\Calendar\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Models\AcademicProgram;
use App\Models\Archive;
use App\Helpers\MiPortalService;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

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
    private function getMiPortalUser(int $id)
    {
        try {          
            $miPortal_user = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $id]);         // $miPortal_user[0]->id;
            $miPortal_user = $miPortal_user[0];
        } catch (\Exception $e) {
            return [
                'id' => '',
                'type' => '',
                'name' => ''
            ];
        }

        $ce_user_type = User::where('id', $id)->first()->type ?? '';

        return [
            'id' => $miPortal_user->id  ?? '',
            'type' => $ce_user_type  ?? '',
            'name' => implode(' ', [
                $miPortal_user->name ?? '',
                $miPortal_user->middlename ?? '',
                $miPortal_user->surname  ?? ''
            ])
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
        $miPortal_user = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $archive->user_id]);         // $miPortal_user[0]->id;
        $miPortal_user = $miPortal_user[0];

        $user = User::find($archive->user_id);

        $intention_letter_professor  = [
            'id' => '-1',
            'type' => '',
            'name' => ''
        ];

        if(isset($archive->intentionLetter->user_id)){
            try {
                // $miPortal_professor = $this->service->miPortalGet('api/usuarios', ['filter[id]' => $archive->intentionLetter->user_id])->collect();
                $miPortal_professor = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $archive->intentionLetter->user_id]);         // $miPortal_user[0]->id;
                $miPortal_professor = $miPortal_professor[0];
            } catch (\Exception $e) {
                return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
            }

            // Cargar los datos del profesor 
            $professor = User::find($archive->intentionLetter->user_id);
            $intention_letter_professor['id'] = $miPortal_professor->id ?? '';
            $intention_letter_professor['type'] = $professor->type ?? '';
            $intention_letter_professor['name'] = implode(' ', [
                $miPortal_professor->name ?? '',
                $miPortal_professor->middlename ?? '',
                $miPortal_professor->surname  ?? ''
            ]);
        }

        return [
            'id' => $miPortal_user->id  ?? '',
            'type' => $user->type ?? '',
            'name' => implode(' ', [
                $miPortal_user->name ?? '',
                $miPortal_user->middlename ?? '',
                $miPortal_user->surname ?? ''
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
            // $miPortal_user =  $this->service->miPortalGet('api/usuarios', ['filter[id]' => $area['professor_id']])->collect();
            $miPortal_user = DB::connection('portal_real')->select('select * from users where id = :id', ['id' => $area['professor_id']]);         // $miPortal_user[0]->id;
            $miPortal_user = $miPortal_user[0];
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), 200); //Ver info archivos en consola
        }

        $name = implode(' ', [
            $miPortal_user->name ?? '',
            $miPortal_user->middlename ?? '',
            $miPortal_user->surname  ?? ''
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
        $announcements = $this->announcements->map(function ($announcement) use ($request){

            $AnnouncementArchives = $announcement->archives;
            // * Load archive´s missing data.
            $AnnouncementArchives->loadMissing('appliant', 'intentionLetter');
            // * Filter the archives that have status between 5 and 7.
            $AnnouncementArchives = $AnnouncementArchives->filter(
                fn ($archive) => ($archive->status === 5 || $archive->status === 7)
            // * Filter the archives that have appliant and intention letter info.
            )->filter(function($archive){
                $archive = $archive->toArray();
                return $archive['appliant'] != null && $archive['intention_letter'] != null;
            // * Filter the archives that doesn't have interview programed.
            })->filter(function ($archive) {
                return count($archive->appliant->interviews) == 0?true:false;
            // * Filter the archives that doesn't have interview programed.
            })->map(function ($archive) use ($request) {
                // ! Get the user data from the AA database using the second available connection, db2 
                $UserPortalData = $this->getMiPortalUser($archive->appliant->id);
                $archive = $archive->toArray();
                $ILProfessorPortalData = $this->getMiPortalUser($archive['intention_letter']['user_id']);
                return [
                    'id' => $UserPortalData['id'],
                    'type' => $UserPortalData['type'],
                    'name' => $UserPortalData['name'],
                    'intention_letter_professor' => $ILProfessorPortalData
                ];
            })->values();

            return [
                'id' => $announcement->id,
                'academic_program' => $announcement->academicProgram->name,
                'appliants' => $AnnouncementArchives
            ];
            
        });

        return $announcements;
    }

    /**
     * Sets the available announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setInterviewAppliant($request, &$interview)
    {
        $miPortal_user = $this->getMiPortalUser($interview['appliant'][0]['id']);
        $interview['appliant'] = $miPortal_user;
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

        $miPortal_user = $this->getMiPortalUser($id);

        $interview['intention_letter_professor'] = $miPortal_user;
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
        $period = [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'virtual_rooms' => $this->rooms->filter(function ($room) {
                return str_contains($room->site, 'Zoom') ? $room : false;
            })->values(),
            'rooms' => $this->rooms->filter(function ($room) {
                return str_contains($room->site, 'Zoom') ? false : $room;
            })->values(),
            'modality' => $this->modality
        ];

        return $period;
    }

    private function setInterviews($request){

        $this->interviews->loadMissing('intentionLetterProfessor','academicAreas');

        // * Descarta las entrevistas que no tienen cartas de intención
        $this->interviews = $this->interviews->filter(function ($interview) {
            $interview = $interview->toArray();
            return isset($interview['intention_letter_professor']) && $interview['appliant'][0]['id'];
        })->map(function ($interview) use ($request) {
            $interview = $interview->toArray();
            // * Se incorporan los datos del postulante
            $this->setInterviewAppliant($request, $interview);
            // * Se incorpora los datos del profesor que entrego la carta de intencion al postulante
            $this->setIntentionLetterProfessor($request, $interview);
            // * Se incorporan las areas academicas de la entrevista
            $this->setInterviewAcademicAreas($request, $interview);
            return $interview;
        })->toArray();
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // * Donsn't exist an active period
        if (!isset($this->id)) {
            return [
                'interviews' => null,
                'announcements' => null,
                'user' => (new UserResource($request->user()))->toArray($request),
                'period' => null,
                'lastestAnnouncements' => AcademicProgram::all()->loadMissing('latestAnnouncement')
            ];
        }

        // * Data for active period
        $period_data = $this->setPeriod($request);
        $announcements = $this->setAnnouncements($request);
        $this->setInterviews($request);

        return [
            'interviews' => $this->interviews,
            'announcements' => $announcements,
            'user' => (new UserResource($request->user()))->toArray($request),
            'period' => $period_data,
            'lastestAnnouncements' => null
        ];
    }
}
