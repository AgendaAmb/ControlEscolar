<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class WorkingExperience extends Model
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
     * @return BelongsToMany
     */
    public function requiredDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class)->withPivot('location');
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function archive(): BelongsTo
    {
        return $this->belongsTo(Archive::class);
    }
}
