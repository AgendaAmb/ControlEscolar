<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicProgram extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function oldestAnnouncement(): HasOne
    {
        return $this->hasOne(Announcement::class)->oldestOfMany();
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function latestAnnouncement(): HasOne
    {
        return $this->hasOne(Announcement::class)->latestOfMany();
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function requiredDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class);
    }
}
