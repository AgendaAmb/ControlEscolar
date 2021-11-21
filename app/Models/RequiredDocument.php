<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredDocument extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'intention_letter',
        'recommendation_letter',
    ];

    /**
     * Eager loaded relationships.
     *
     * @var array
     */
    protected $casts = [
        'intention_letter' => 'boolean',
        'recommendation_letter' => 'boolean',
    ];
    
    /**
     * Obten los documentos requeridos por tipo.
     *
     * @param  mixed $query
     * @param  mixed $type
     * @return void
     */
    public static function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Obtiene los documentos que solo los postulantes
     * pueden subir.
     *
     * @param  mixed $query
     * @return void
     */
    public static function scopeAppliantDocuments($query)
    {
        return $query->where('intention_letter', false)
            ->where('recommendation_letter', false);
    }

    /**
     * Obtiene los documentos que solo los postulantes
     * pueden subir.
     *
     * @param  mixed $query
     * @return void
     */
    public static function scopeIntentionLetter($query)
    {
        return $query->where('intention_letter', true)
            ->where('type', 'entrance');
    }

    /**
     * Obtiene los documentos que solo los postulantes
     * pueden subir.
     *
     * @param  mixed $query
     * @return void
     */
    public static function scopeRecommendationLetter($query)
    {
        return $query->where('recommendation_letter', true)
            ->where('type', 'entrance');
    }

    /**
     * Obtiene el id de los documentos personales.
     *
     * @param  mixed $query
     * @return array
     */
    public static function personalDocumentsId()
    {
        return self::where('type', 'personal')->pluck('id');
    }

    /**
     * Obtiene el id de los documentos personales.
     *
     * @param  mixed $query
     * @return array
     */
    public static function entranceDocumentsId()
    {
        return self::where('type', 'entrance')->pluck('id');
    }

    /**
     * Obtiene el id de los documentos personales.
     *
     * @param  mixed $query
     * @return array
     */
    public static function bachelorDocumentsId()
    {
        return self::where('type', 'academic-lic')->pluck('id');
    }

    /**
     * Obtiene el id de los documentos de maestría.
     *
     * @param  mixed $query
     * @return array
     */
    public static function masterDocumentsId()
    {
        return self::where('type', 'academic-mast')->pluck('id');
    }

    /**
     * Obtiene el id de los documentos para comprobación de
     * lenguas extranjeras.
     *
     * @param  mixed $query
     * @return array
     */
    public static function languageDocumentsId()
    {
        return self::where('type', 'language')->pluck('id');
    }

    /**
     * Obtiene el id de los documentos para comprobación de
     * lenguas extranjeras.
     *
     * @param  mixed $query
     * @return object
     */
    public static function intentionLetterId()
    {
        return self::where('type', 'entrance')->where('intention_letter', true)->pluck('id');
    }

    /**
     * Obtiene los expedientes, asociados al documento requerido.
     *
     * @return void
     */
    public function archives()
    {
        return $this->belongsToMany(Archive::class);
    }
}
