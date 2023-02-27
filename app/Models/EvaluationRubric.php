<?php

namespace App\Models;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class EvaluationRubric extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * Relationship eager loads.
     *
     * @var array
     */
    protected $with = [
        'professor'
    ];

    /**
     * The attributes appended for serialization.
     *
     * @var array
     */
    protected $appends = [
        'reseachConceptsDetails',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];


    // CUSTOM VARIABLES

    // Factores de ponderación de los rubros para DOCTORADO
    public static $SCORE_DOCTORADO = [
        'basic'     => 10, 
        'academic'  => 35,
        'research'  => 30,
        'exp'       => 10,
        'personal'  => 15,
    ];
    
    // Factores de ponderación de los rubros para MAESTRÍA
    public static $SCORE_MAESTRIA = [
        'basic'     => 15, 
        'academic'  => 30,
        'research'  => 15,
        'exp'       => 25,
        'personal'  => 15,
    ];

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsTo
     */
    public function archive(): BelongsTo
    {
        return $this->belongsTo(Archive::class);
    }

    /**
     * Gets the professor who filled the rubric.
     *
     * @return BelongsTo
     */
    public function professor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Gets the list of every  evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function evaluationConcepts(): BelongsToMany
    {
        return $this->belongsToMany(EvaluationConcept::class)
            ->select('evaluation_concepts.*', 'notes', 'score');
    }

    /**
     * Gets the list of basic concepts.
     *
     * @return BelongsToMany
     */
    public function basicConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('basic');
    }

    /**
     * Gets the list of academic concepts.
     *
     * @return BelongsToMany
     */
    public function academicConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('academic');
    }

    /**
     * Gets the list of research concepts.
     *
     * @return BelongsToMany
     */
    public function researchConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('research');
    }

    /**
     * Gets the list of workingExperience concepts.
     *
     * @return BelongsToMany
     */
    public function workingExperienceConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('working_experience');
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function personalAttributesConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('personal_attributes');
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return array
     */
    public function getResearchConceptsDetailsAttribute(): array
    {
        $filename = implode('/', ['evaluation_rubrics', $this->id]);
        $content = Storage::get($filename);

        return json_decode($content, true);
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @param array $details
     * @return void
     */
    public function setResearchConceptsDetailsAttribute(array $details): void
    {
        $filename = implode('/', ['evaluation_rubrics', $this->id]);
        Storage::put($filename, json_encode($details, JSON_PRETTY_PRINT));
    }


    /**Funcion que regresa el promedio de una rubrica de los datos basicos*/
    public function getAverageScoreBasicConcepts(String $rubro): float
    {   
        
        //Porcentaje del 100 que vale los datos basicos//
        $BasicConceptsPercentage = $rubro==="doctorado"?$this::$SCORE_DOCTORADO['basic']:$this::$SCORE_MAESTRIA['basic'];
        $degree_average = 0.0;
        $country = "México";

        // Retorna el promedio del grado academico anterior al que postula 
        try{
            $academic_degrees = Archive::find($this->archive_id)->academicDegrees;
            foreach($academic_degrees as $ad){
                if($rubro=="doctorado"){
                    if($ad->degree_type=="Maestría"){
                        $degree_average = $ad->average;
                        $country = $ad->country;
                    }
                    break;
                }else{
                    if($ad->degree_type=="Licenciatura"){
                        $degree_average = $ad->average;
                        $country = $ad->country;
                    }
                    break;
                }
            }

            // Ponderación para extudiante foráneo
            if($country!="México"){
                $degree_average = (10/$ad->max_avg) * $ad->average;
            }else{
                if($degree_average > 10){                           // Porque ashsss.. la gente jaja
                    $degree_average/=10;
                }
            }
        }catch(\Exception $e){
            return $degree_average;
        }

        // (this . estudio_score * doctorado) / 10
        return ($degree_average * $BasicConceptsPercentage)/10.0;
    }
    
    /**Funcion que regresa el promedio de una rubrica de los Datos academicos*/
    public function getAverageScoreAcademicConcepts(String $rubro): Float
    {
        //Porcentaje del 100 que vale los Datos academicos//
        $academicConceptsPercentage = $rubro==="doctorado"?$this::$SCORE_DOCTORADO['academic']:$this::$SCORE_MAESTRIA['academic'];
        $PromedioAc = 0;
        //**Sumatoria de valores  */
        foreach ($this->academicConcepts as $academicC) {
            $PromedioAc += $academicC->score;
        }
        $PromedioAc = (($PromedioAc * $academicConceptsPercentage) / count($this->academicConcepts)) / 100;
        return $PromedioAc;
    }
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageScoreResearchConcepts(String $rubro): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $researchConceptsPercentage = $rubro==="doctorado"?$this::$SCORE_DOCTORADO['research']:$this::$SCORE_MAESTRIA['research'];
         $PromedioRC = 0;
         //**Sumatoria de valores  */
         foreach ($this->researchConcepts as $ResearchC) {
             $PromedioRC += $ResearchC->score;
         }
         $PromedioRC = (($PromedioRC * $researchConceptsPercentage) / count($this->researchConcepts)) / 100;
         return $PromedioRC;
     }
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageWorkingExperienceConcepts(String $rubro): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $workingExperienceConceptsPercentage = $rubro==="doctorado"?$this::$SCORE_DOCTORADO['exp']:$this::$SCORE_MAESTRIA['exp'];
         $PromedioWEC = 0;
         //**Sumatoria de valores  */
         foreach ($this->workingExperienceConcepts as $workingExperienceConcept) {
            $PromedioWEC += $workingExperienceConcept->score;
         }
         $PromedioWEC = (($PromedioWEC * $workingExperienceConceptsPercentage) / count($this->workingExperienceConcepts)) / 100;
         return $PromedioWEC;
     }
     
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageWorkingPersonalAttributesConcepts(String $rubro): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $personalAttributesConceptsPerfcentage = $rubro==="doctorado"?$this::$SCORE_DOCTORADO['personal']:$this::$SCORE_MAESTRIA['personal'];;
         $PromedioPEC=0;
         //**Sumatoria de valores  */
         foreach ($this->personalAttributesConcepts as $personalAttributesConcept) {
            $PromedioPEC += $personalAttributesConcept->score;
         }
         $PromedioPEC = (($PromedioPEC * $personalAttributesConceptsPerfcentage) / count($this->personalAttributesConcepts)) / 100;
         return $PromedioPEC;
     }
}
