<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
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
        'laravel_through_key',
        'pivot'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $casts = [
        'confirmed' => 'bool'
    ];

    /**
     * Obtiene los usuarios de la entrevista.
     *
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Obtiene los usuarios de la entrevista.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

     /**
     * Obtiene los usuarios de la entrevista.
     *
     * @return HasMany
     */
    public function evaluationRubrics(): HasMany
    {
        return $this->hasMany(EvaluationRubric::class);
    }


    /**
     * Obtiene las áreas académicas de la entrevista.
     * @return BelongsToMany
     * 
     */
    public function appliant(): BelongsToMany
    {
        return $this->users()->whereHas('roles', function($query){ 
            $query->whereIn('name', [
                'aspirante_local',
                'aspirante_foraneo',
                'aspirante_extranjero'
            ]); 
        });
    }

    /**
     * Obtiene las áreas académicas de la entrevista.
     * @return BelongsToMany
     * 
     */
    public function intentionLetterProfessor(): BelongsToMany
    {
        return $this->users()->join('archives', 'archives.user_id', 'users.id')
            ->join('archive_required_document', 'archives.id', 'archive_required_document.archive_id')    
            ->join('archive_intention_letter', 'archive_intention_letter.archive_required_document_id', 'archive_required_document.id')
            ->select('archive_intention_letter.user_id as id', 'archive_intention_letter.user_type as type');
    }

    /**
     * Obtiene las áreas académicas de la entrevista.
     * @return BelongsToMany
     * 
     */
    public function academicAreas(): BelongsToMany
    {
        return $this
        ->users()
        ->whereHas('roles', fn($query) => $query->where('name', 'profesor_nb'))
        ->join('academic_area_user', 'users.id', 'academic_area_user.user_id')
        ->join('academic_areas', 'academic_areas.id', 'academic_area_id')
        ->select(
            'academic_areas.id as area_id', 
            'academic_areas.name as area_name',
            'academic_area_user.user_id as professor_id'
        );
    }
}
