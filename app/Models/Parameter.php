<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parameter extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $table = 'parameters_recommendation_letter';
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return HasMany
     */
    public function score_parameters(): HasMany
    {
        return $this->hasMany(ScoreParameter::class);
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function recommendation_letter(): BelongsTo
    {
        return $this->belongsTo(MyRecommendationLetter::class);
    }
}
