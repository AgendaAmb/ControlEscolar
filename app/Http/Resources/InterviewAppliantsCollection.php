<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InterviewAppliantsCollection extends ResourceCollection
{
    /**
     * Usuarios de Mi Portal.
     * 
     * @var object
     */
    public $miPortal_workers;
    
    /**
    * Usuarios de Mi Portal.
    * 
    * @var object
    */
   public $miPortal_appliants;


        
    /**
     * __construct
     *
     * @param  mixed $resource
     * @param  mixed $miPortal_workers
     * @param  mixed $miPortal_appliants
     * @return void
     */
    public function __construct($resource, $miPortal_workers, $miPortal_appliants)
    {
        parent::__construct($resource);
        $this->miPortal_workers = $miPortal_workers;
        $this->miPortal_appliants = $miPortal_appliants;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->miPortal_appliants->map(function($appliant){
            # Fusiona los datos de Mi Portal con los del sistema actual.
            $app_appliant = $this->where('type', $appliant['user_type'])->where('id', $appliant['id'])->first();

            # Recupera la carta de intención.
            $intention_letter = $app_appliant->latestArchive->intentionLetters->first()->toArray();
            
            # Elimina el eager load.
            unset($app_appliant->latestArchive->intentionLetters);

            # Fusiona los datos de Mi Portal
            $merged_appliant = collect($app_appliant->toArray())->merge($appliant);

            # Agrega al profesor de la carta de intención.
            $merged_appliant['intention_letter_professor'] = $this->miPortal_workers
                ->where('id', $intention_letter['user_id'])
                ->where('user_type', $intention_letter['user_type'])
                ->first();
        

            # Devuelve al postulante.
            return $merged_appliant;
        });

        return $data;
    }
}