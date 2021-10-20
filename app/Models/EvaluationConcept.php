<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationConcept extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Gets the list of evaluation concepts.
     *
     * @return BelongsToMany
     */
    public function evaluationRubrics(): BelongsToMany
    {
        return $this->belongsToMany(EvaluationRubric::class);
    }

    /**
     * Gets the list of evaluation concepts.
     *
     * @return HasMany
     */
    public function evaluationConceptDetails(): HasMany
    {
        return $this->hasMany(EvaluationConceptDetail::class);
    }
}
