<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Archive extends Model
{
    use HasFactory;

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
        'personalDocuments',
        'entranceDocuments',
        'academicProgram', 
        'academicDegrees.requiredDocuments',
        'appliantLanguages.requiredDocuments',
        'appliantWorkingExperiences',
    ];

    /**
     * Obtiene los documentos requeridos del expediente.
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
     * Obtiene las experiencias laborales del postulante.
     *
     * @return HasMany
     */
    public function appliantWorkingExperiences(): HasMany
    {
        return $this->hasMany(WorkingExperience::class);
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
