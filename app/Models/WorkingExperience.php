<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkingExperience extends Model
{
    use HasFactory;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

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
