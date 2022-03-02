<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArchiveRequiredDocument extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $table = 'archive_required_document';

    /**
    * Indicates if the model has timestamps.
    *
    * @var bool
    */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Obtiene la carta de intención.
     *
     * @return BelongsTo
     */
    public function archive(): BelongsTo
    {
        return $this->belongsTo(Archive::class);
    }

    /**
     * Obtiene la carta de intención y recomendacion.
     *
     * @return BelongsTo
     */
    public function requiredDocument(): BelongsTo
    {
        return $this->belongsTo(RequiredDocument::class);
    }

    /**
     * Obtiene la carta de intención.
     *
     * @return HasOne
     */
    public function intentionLetter(): HasOne
    {
        return $this->hasOne(IntentionLetter::class);
    }

    /**
     * Obtiene la carta de intención.
     *
     * @return HasMany
     */
    public function recommendationLetter(): HasMany
    {
        return $this->hasMany(RecommendationLetter::class);
    }

    /**
     * Obtiene la carta de intención.
     *
     * @return Builder
     */
    public static function scopeWhereIsIntentionLetter(Builder $query): Builder
    {
        return $query->whereHas(
            'requiredDocument', fn($q) => $q->where('intention_letter', true)->where('type', 'entrance')
        );
    }

    /**
     * Obtiene la carta de recomendacion.
     *
     * @return Builder
     */
    public static function scopeWhereIsRecommendationLetter(Builder $query): Builder
    {
        return $query->whereHas(
            'requiredDocument', fn($q) => $q->where('recommendation_letter', true)->where('type', 'curricular')
        );
    }
}