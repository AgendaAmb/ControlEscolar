<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class ScoreParameter extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'score_parameters_rl';

    protected $fillable = [
        'rl_id',
        'parameter_id',
        'score' 
    ];

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function parameter(): BelongsTo
    {
        return $this->belongsTo(Parameter::class);
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
