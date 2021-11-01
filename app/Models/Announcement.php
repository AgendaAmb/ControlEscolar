<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\JoinClause;

class Announcement extends Model
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
        'deleted_at'
    ];

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function academicProgram(): BelongsTo
    {
        return $this->belongsTo(AcademicProgram::class);
    }
    /**
     * Obtiene el periodo de entrevista, que está asociado a 
     * la convocatoria.
     *
     * @return HasOne
     */
    public function period(): HasOne
    {
        return $this->hasOne(Period::class);
    }

    /**
     * Obtiene el periodo de entrevista, que está asociado a 
     * la convocatoria.
     *
     * @return HasMany
     */
    public function archives(): HasMany
    {
        return $this->hasMany(Archive::class);
    }
}