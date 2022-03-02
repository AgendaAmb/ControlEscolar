<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ScoreParameter extends Model
{
    use HasFactory;

    protected $table = 'score_parameters_rl';

    protected $fillable = [
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
