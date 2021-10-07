<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
     * Eager loaded relationships.
     *
     * @var string[]
     */
    protected $with = [
        'academicAreas',
        'personalDocuments',
        'entranceDocuments',
        'academicProgram', 
        'academicDegrees.requiredDocuments',
        'appliantLanguages.requiredDocuments',
        'appliantWorkingExperiences',
        'scientificProductions.authors',
        'humanCapitals'
    ];

    /**
     * Obtiene las áreas académicas de interés.
     *
     * @return BelongsToMany
     */
    public function academicAreas(): BelongsToMany
    {
        return $this->belongsToMany(AcademicArea::class);
    }
    
    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function personalDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class)
            ->withPivot('location')
            ->where('type', 'personal');
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return BelongsToMany
     */
    public function entranceDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class)
            ->withPivot('location')
            ->where('type', 'entrance');
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
    public function academicProgram(): BelongsTo
    {
        return $this->belongsTo(AcademicProgram::class);
    }
}
