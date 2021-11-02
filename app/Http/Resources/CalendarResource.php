<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CalendarResource extends JsonResource
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
        $areas = collect($interview['academic_areas'])->map(function($area) use ($request) {
            $miPortal_professor = $this->getMiPortalUser($request, $area['professor_id'], 'workers'); 
            
            return [
                'id' => $area['area_id'],
                'name' => $area['area_name'],
                'professor_name' => Str::lower($miPortal_professor['name'])
            ];
        });

        # Determina Si el usuario ya está inscrito al área académica
        # de la entrevista.
        /*$user_areas_available = $request->user()->academicAreas
            ->whereIn('name', $areas->pluck('name'))
            ->count() === 0;
        
        $areas = $areas->toArray();

        # Verifica que el usuario pueda registrarse a la entrevista.
        if ($user_areas_available === true)
        {
            $miPortal_user = $this->getMiPortalUser($request, $request->user()->id, 'workers');
            $area = $request->user()->academicAreas->first();
            $areas[] = [
                'id' => $area->id,
                'name' => $area->name,
                'professor_name' => $miPortal_user['name']
            ];
        }*/

        $areas = $areas->toArray();
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
        $this->periods = $this->announcements->map->period;
        $this->period = $this->periods->filter(function ($period){
            return $period !== null;
        })->first();


        # Carga los modelos asociados al periodo y quita las convocatorias.
        if ($this->period === null)
            return; 
            
        $this->announcements = null;
        $this->period->interviews = $this->period->interviews->map(function($interview) use ($request){
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
        $this->appliants = $archives->map(function($archive) use ($request){
            
            $miPortal_appliant = collect($request
                ->session()
                ->get('appliants'))
                ->firstWhere('id', $archive->user_id);

            $miPortal_professor = collect($request
                ->session()
                ->get('workers'))
                ->firstWhere('id', $archive->intentionLetter->user_id);
            
            return [
                'id' => $miPortal_appliant['id'],
                'type' => $miPortal_appliant['user_type'],
                'name' => implode(' ', [$miPortal_appliant['name'],$miPortal_appliant['middlename'],$miPortal_appliant['surname']]),
                'intention_letter_professor' => [
                    'id' => $miPortal_professor['id'],
                    'type' => $miPortal_professor['user_type'],
                    'name' => implode(' ', [$miPortal_professor['name'],$miPortal_professor['middlename'],$miPortal_professor['surname']]),
                ],
            ];
        })->toArray();
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
        $this->user['roles'] = $worker->roles;
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
        $this->setUser($request);

        return [
            'appliants' => $this->appliants ?? null,
            'announcements' => $this->announcements,
            'user' => $this->user,
            'period' => $this->period,
        ];
    }
}
