<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
