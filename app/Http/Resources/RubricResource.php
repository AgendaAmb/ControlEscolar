<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Models\User;
use App\Helpers\MiPortalService;
use App\Models\Interview;

class RubricResource extends JsonResource
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


        $service = new MiPortalService;
        $miPortal_user =  $service->miPortalGet('api/usuarios', ['filter[id]' => $id])->collect();
        $miPortal_user = $miPortal_user[0];

        // $miPortal_user = collect($request
        //     ->session()
        //     ->get($type))
        //     ->firstWhere('id', $id);

        $name = implode(' ', [$miPortal_user['name'],$miPortal_user['middlename'],$miPortal_user['surname']]);

        $user = User::find($id);

        return [
            'id' => $miPortal_user['id'],
            'type' => $user->type,
            'name' => Str::lower($name),
            'curp' => $miPortal_user['curp'],
            'email' => $miPortal_user['email'],
            'birth_country' => $miPortal_user['nationality'],
            'birth_state' => $user->birth_state,
            'residence_country' => $miPortal_user['residence'],
            'residence_state' => "",
            'marital_state' => $user->marital_state, 
            "address" => ""
        ];
    }

    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param string $type
     * @return void
     */
    private function setAppliant($request)
    {
        $archive = $this->resource->archive;
        $this->appliant = $this->getMiPortalUser($request, $archive->user_id, 'appliants');
    }   

    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param string $type
     * @return void
     */
    private function setRubric($request)
    {
        $rubric = $this->resource;
        $dictamen_professor = null;
        
        try{
            $dictamen_professor = Interview::firstWhere('id', $rubric->interview_id)->dictamenRedactor;
        }catch(\Exception $e){}

        $this->rubric = [
            'id' => $rubric->id,
            'interview_id' => $rubric->interview_id,
            'dictamen_redactor' => $dictamen_professor,
            'rubric_user_id' => $rubric->user_id,
            'considerations' => $rubric->considerations,
            'additional_information' => $rubric->additional_information,
            'dictamen_ce' => $rubric->dictamen_ce,
            'dictamen_individual' => $rubric->dictamen_individual,
            'basic_concepts' => $rubric->basicConcepts->toArray(),
            'academic_concepts' => $rubric->academicConcepts->toArray(),
            'research_concepts' => $rubric->researchConcepts->toArray(),
            'isComplete'=>$rubric->isComplete,
            'working_experience_concepts' => $rubric->workingExperienceConcepts->toArray(),
            'personal_attributes_concepts' => $rubric->personalAttributesConcepts->toArray(),
        ];
    } 

    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param string $type
     * @return void
     */
    private function setResearchConceptDetails($request)
    {
        $rubric = $this->resource;
        $details = collect($rubric->researchConceptsDetails);
        
        $research_concepts = $rubric->researchConcepts->map(function($concept) use ($details){
            $concept_details = $details->where('id', $concept->id)
                ->groupBy('group')
                ->values()
                ->toArray();

            $concept = $concept->toArray();
            $concept['evaluation_concept_details'] = $concept_details;

            return $concept;
        });

        $this->rubric['research_concepts'] = $research_concepts;
    } 

    /**
     * Gets an user from the main system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @param string $type
     * @return void
     */
    private function setAnnouncement($request)
    {
        $rubric = $this->resource;
        $announcement = $rubric->archive->announcement;

        $this->announcement = [
            'id' => $announcement->id,
            'from' => $announcement->from,
            'to' => $announcement->to,
            'academic_program' => $announcement->academicProgram->name,
            'type' => $announcement->academicProgram->type
        ];
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
        $this->user['roles'] = $worker->roles->toArray();
    }


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->setAppliant($request);
        $this->setUser($request);
        $this->setRubric($request);
        $this->setResearchConceptDetails($request);
        $this->setAnnouncement($request);

        return [
            'user' => $this->user,
            'appliant' => $this->appliant,
            'rubric' => $this->rubric,
            'announcement' => $this->announcement,
            'basic_concepts' => $this->basic_concepts
        ];
    }
}
