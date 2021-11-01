<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archive extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Une el nombre del programa académico con la convocatoria.
     *
     * @return QueryBuilder
     */
    public function scopeWhereAppliantDoesntHaveInterview(Builder $query): Builder
    {
        return $query->whereHas('appliant', function($subquery){
            $subquery->doesntHave('interviews');
        });
    }

    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function requiredDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class)->withPivot('location');
    }

    
    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function personalDocuments(): BelongsToMany
    {
        return $this->requiredDocuments()->where('type', 'personal');
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return BelongsToMany
     */
    public function entranceDocuments(): BelongsToMany
    {
        return $this->requiredDocuments()->where('type', 'entrance')->where('intention_letter', false);
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return HasMany
     */
    public function archiveRequiredDocuments(): HasMany
    {
        return $this->hasMany(ArchiveRequiredDocument::class);
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return HasOneThrough
     */
    public function intentionLetter(): HasOneThrough
    {
        return $this->hasOneThrough(IntentionLetter::class, ArchiveRequiredDocument::class);
    }

    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function appliant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasMany
     */
    public function appliantLanguages(): HasMany
    {
        return $this->hasMany(AppliantLanguage::class);
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasMany
     */
    public function academicDegrees(): HasMany
    {
        return $this->hasMany(AcademicDegree::class);
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasOne
     */
    public function latestAcademicDegree(): HasOne
    {
        return $this->hasOne(AcademicDegree::class)->latestOfMany();
    }

    /**
     * Obtiene las experiencias laborales del postulante.
     *
     * @return HasMany
     */
    public function appliantWorkingExperiences(): HasMany
    {
        return $this->hasMany(WorkingExperience::class);
    }

    /**
     * Obtiene las producciones científicas del postulante.
     *
     * @return HasMany
     */
    public function scientificProductions(): HasMany
    {
        return $this->hasMany(ScientificProduction::class)
            ->leftJoin('articles', 'scientific_productions.id', 'articles.scientific_production_id')
            ->leftJoin('published_chapters', 'scientific_productions.id', 'published_chapters.scientific_production_id')
            ->leftJoin('technical_reports', 'scientific_productions.id', 'technical_reports.scientific_production_id');
    }

    /**
     * Obtiene los capitales humanos del postulante.
     *
     * @return HasMany
     */
    public function humanCapitals(): HasMany
    {
        return $this->hasMany(HumanCapital::class);
    }

    /**
     * Obtiene el programa académico, al cual corresponde
     * el expediente.
     *
     * @return BelongsTo
     */
    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }

    /**
     * Obtiene el programa académico, al cual corresponde
     * el expediente.
     *
     * @return HasOne
     */
    public function evaluationRubric(): HasOne
    {
        return $this->hasOne(EvaluationRubric::class);
    }
}
