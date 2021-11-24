<?php

namespace App\Models;

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
    public function getAverageScoreBasicConcepts(): Float
    {
        //Porcentaje del 100 que vale los datos basicos//
        $BasicConceptsPercentage = 15;
        $PromedioBC = 0;
        //**Sumatoria de valores  */
        foreach ($this->basicConcepts as $basicC) {
            $PromedioBC += $basicC->score;
        }
        //**Calculo de promedio de Datos basicos */
        $PromedioBC = (($PromedioBC * $BasicConceptsPercentage) / count($this->basicConcepts)) / 100;

        return $PromedioBC;
    }
    /**Funcion que regresa el promedio de una rubrica de los Datos academicos*/
    public function getAverageScoreAcademicConcepts(): Float
    {
        //Porcentaje del 100 que vale los Datos academicos//
        $academicConceptsPercentage = 30;
        $PromedioAc = 0;
        //**Sumatoria de valores  */
        foreach ($this->academicConcepts as $academicC) {
            $PromedioAc += $academicC->score;
        }
        $PromedioAc = (($PromedioAc * $academicConceptsPercentage) / count($this->academicConcepts)) / 100;
        return $PromedioAc;
    }
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageScoreResearchConcepts(): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $researchConceptsPercentage=15;
         $PromedioRC = 0;
         //**Sumatoria de valores  */
         foreach ($this->researchConcepts as $ResearchC) {
             $PromedioRC += $ResearchC->score;
         }
         $PromedioRC = (($PromedioRC * $researchConceptsPercentage) / count($this->researchConcepts)) / 100;
         return $PromedioRC;
     }
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageWorkingExperienceConcepts(): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $workingExperienceConceptsPercentage=20;
         $PromedioWEC = 0;
         //**Sumatoria de valores  */
         foreach ($this->workingExperienceConcepts as $workingExperienceConcept) {
            $PromedioWEC += $workingExperienceConcept->score;
         }
         $PromedioWEC = (($PromedioWEC * $workingExperienceConceptsPercentage) / count($this->workingExperienceConcepts)) / 100;
         return $PromedioWEC;
     }
     
     /**Funcion que regresa el promedio de una rubrica de los Datos de investigacion*/
     public function getAverageWorkingPersonalAttributesConcepts(): Float
     {
         //Porcentaje del 100 que vale los Datos de investigacion//
         $personalAttributesConceptsPerfcentage=15;
         $PromedioPEC=0;
         //**Sumatoria de valores  */
         foreach ($this->personalAttributesConcepts as $personalAttributesConcept) {
            $PromedioPEC += $personalAttributesConcept->score;
         }
         $PromedioPEC = (($PromedioPEC * $personalAttributesConceptsPerfcentage) / count($this->personalAttributesConcepts)) / 100;
         return $PromedioPEC;
     }
}
