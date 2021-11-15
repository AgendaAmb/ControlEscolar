<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Eager load relationships.
     *
     * @var string[]
     */
    protected $with = [
        'interviews.appliant:id,type',
        'interviews.academicAreas',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Obtiene las salas que pertenecen al periodo de la
     * convocatoria actual.
     *
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Obtiene las salas que pertenecen al periodo de la
     * convocatoria actual.
     *
     * @return HasManyThrough
     */
    public function interviews(): HasManyThrough
    {
        return $this->hasManyThrough(Interview::class, Room::class);
    }

    /**
     * Obtiene la convocatoria del periodo de entrevistas.
     *
     * @return HasManyThrough
     */
    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }
}
