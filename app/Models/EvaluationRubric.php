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
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function evaluationConcepts(): BelongsToMany
    {
        return $this->belongsToMany(EvaluationConcept::class)
            ->select('evaluation_concepts.*', 'notes', 'score');
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function basicConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('basic');
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function academicConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('academic');
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function researchConcepts(): BelongsToMany
    {
        return $this->evaluationConcepts()->type('research');
    }

    /**
     * Gets the list of evaluation concepts.
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
        $filename = implode('/', ['evaluation_rubrics',$this->id]);
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
        $filename = implode('/', ['evaluation_rubrics',$this->id]);
        Storage::put($filename, json_encode($details, JSON_PRETTY_PRINT));
    }
}
