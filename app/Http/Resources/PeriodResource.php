<?php

namespace App\Http\Resources;

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
        # Usuarios del sistema central.
        $miPortal_appliants = $request->session()->get('appliants');
        $miPortal_workers = $request->session()->get('workers');

        $this->interviews = $this->interviews->map(function($interview) use ($miPortal_appliants, $miPortal_workers, $request){

            # Asigna al postulante.
            $appliant = $interview->appliant->first();
            unset($interview->appliant);
            $interview->appliant = $appliant;

            # Recupera la carta de intención.
            $intention_letter = $interview->appliant->latestArchive->intentionLetters->first()->toArray();
    
            # Obtiene las coincidencias de los usuarios de mi portal.
            $appliant = $miPortal_appliants->where('id', $interview->appliant->id)
                ->where('user_type', $interview->appliant->type)
                ->first();

            $professor = $miPortal_workers->where('id', $intention_letter['user_id'])
            ->where('user_type', $intention_letter['user_type'])
            ->first();
        
            # Llena los datos, junto con la información del sistema central.
            $interview->appliant->fill($appliant ?? []);
            $interview->intention_letter_professor = $professor;    

            # Llena la información de los usuarios que participan en 
            # la entrevista.
            $areas = $interview->academicAreas->map(function($area) use ($miPortal_workers) {
                
                $area->fill($miPortal_workers->firstWhere('id', $area->professor_id));
                $area->professor_name = $area->name.' '.$area->middlename.' '.$area->surname;
                $area->professor_name = Str::lower($area->professor_name);
                $area->id = $area->area_id;
                $area->name = $area->area_name;

                unset($area->area_id);
                unset($area->area_name);
                unset($area->middlename);
                unset($area->surname);

                return $area;
            });

            # Determina Si el usuario ya está inscrito al área académica
            # de la entrevista.
            $user_areas_available = $request->user()->academicAreas
                ->whereIn('name', $areas->pluck('name'))->count() === 0;

            if ($user_areas_available === true)
                $areas->push($request->user->academicAreas());

            # Verifica si la cantidad de áreas académicas es igual a 5.
            # En caso de que no sea así, se llena el arreglo de datos con 5
            # áreas académicas vacías.
            if ($areas->count() < 5)
            {
                $empty_areas = array_fill(
                    0, 5 - $areas->count(), [
                    'name' => 'Área académica disponible',
                    'professor_name' => false
                ]);

                $areas = $areas->toArray();
                $areas = array_merge($areas, $empty_areas);
            }

            unset($interview->academicAreas);
            $interview->academic_areas = $areas;
        
            return $interview;
        });

        return $this;
    }
}
