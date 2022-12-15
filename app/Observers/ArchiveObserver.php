<?php

namespace App\Observers;

use App\Models\Archive;
use App\Models\RequiredDocument;

class ArchiveObserver
{
    /**
     * Handle the Archive "created" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function created(Archive $archive)
    {
        // Crea modelos que se relacionan al archivos
        $archive->academicDegrees()->createMany([
            ['state' => 'Incompleto']
        ]);

        $archive->appliantWorkingExperiences()->createMany([
            ['state' => 'Incompleto']
        ]);

        $archive->scientificProductions()->createMany([
            ['state' => 'Incompleto']
        ]);

        $archive->appliantLanguages()->createMany([
            ['state' => 'Incompleto']
        ]);

        $archive->humanCapitals()->createMany([
            ['state' => 'Incompleto']
        ]);

        $archive->enviromentRelatedSkills()->createMany([
            [
                'message_review' => null,
            ]
        ]);  

        // Only for enrem
        $archive->reasonsToChoise()->createMany([
            [
                'first_choise' => null,                  
                'reasons_choise' => null,
                'others_choises' => null,
                'selected_choises' => null,
            ]
        ]); 

        $archive->address()->createMany([
            [
                'care_of' => null,            
                'street' => null,
                'number_address' => null,
                'city' => null,
                'postal_code' => null,
                'state_country'=> null,
                'telephone' => null,
                'mobile_phone' => null,
            ],
            [
                'care_of' => null,            
                'street' => null,
                'number_address' => null,
                'city' => null,
                'postal_code' => null,
                'state_country'=> null,
                'telephone' => null,
                'mobile_phone' => null,
            ]
        ]); 

        $archive->secondaryEducation()->createMany([
            [
                'school_certificade' => null,                  
                'final_score' => null,
                'name_of_institution' => null,
                'from' => null,
                'to' => null,                  
                'city_country' => null,
            ]
        ]);    

        $archive->futurePlans()->createMany([
            [
                'explain_pursue_future' => null,                  
                'pursue_future' => null,
            ]
        ]);  
        
        $archive->fieldsOfInterest()->createMany([
            [
                'research_area_mexico' => null,                  
                'research_area_german' => null,
                'professor_research_mexico' => null,                  
                'professor_research_german' => null,
                'elective_modules_PMPCA_german' => null,            
                'elective_modules_PMPCA_mexico' => null,                        
                'elective_modules_ITT_german' => null,
                'elective_modules_ITT_mexico' => null,
                'archive_id' => $archive
            ]
        ]); 

        $archive->financingStudies()->createMany([
            [
                'financing_options' => null,                  
            ]
        ]);  

        $archive->recommendationLetterEnrem()->createMany([
            [
                'type' => null, 
                'date' => null,  
                'title' => null,   
                'position' => null,  
                'organization' => null,
                'telephone' => null,     
                'full_name' => null,       
                'email' => null,                          
            ]
        ]);

        $archive->hearAboutProgram()->createMany([
            [
                'how_hear' => null,             
            ]
        ]);  

        // Archivos que pertenecen al expediente, no cuentan con modelo ya que el expediente lo almacena
        $personal_documents_id = RequiredDocument::where('type', 'personal')->pluck('id');
        $entrance_documents_id = RequiredDocument::where('type', 'entrance')->pluck('id');
        $enrem_documents_id = RequiredDocument::where('type', 'enrem')->pluck('id');
        $archive->enremDocuments()->attach($enrem_documents_id);
        $archive->personalDocuments()->attach($personal_documents_id);
        $archive->entranceDocuments()->attach($entrance_documents_id);
    }

    /**
     * Handle the Archive "updated" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function updated(Archive $archive)
    {
    }

    /**
     * Handle the Archive "deleted" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function deleted(Archive $archive)
    {
        //
    }

    /**
     * Handle the Archive "restored" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function restored(Archive $archive)
    {
        //
    }

    /**
     * Handle the Archive "force deleted" event.
     *
     * @param  \App\Models\Archive  $archive
     * @return void
     */
    public function forceDeleted(Archive $archive)
    {
        //
    }
}
