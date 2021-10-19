<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationRubric extends Model
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
    public function evaluationConcepts(): BelongsToMany
    {
        return $this->belongsToMany(EvaluationConcept::class);
    }
}
