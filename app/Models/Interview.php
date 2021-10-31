<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\JoinClause;

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
        'laravel_through_key'
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
     * Obtiene las áreas académicas de la entrevista.
     * @return BelongsToMany
     * 
     */
    public function appliant(): BelongsToMany
    {
        return $this
        ->users()
        ->whereHas('roles', fn($query) => $query->whereIn(
            'name', ['aspirante_local','aspirante_foraneo','aspirante_extranjero'])
        )->limit(1);
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
