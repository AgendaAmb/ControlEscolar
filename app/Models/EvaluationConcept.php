<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
     * Gets the list of evaluation concepts.
     * 
     * @param Builder $builder
     * @param string $type
     * 
     * @return Builder
     *
     */
    public static function scopeType(Builder $builder, string $type): Builder
    {
        return $builder->where('type', $type);
    }

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
