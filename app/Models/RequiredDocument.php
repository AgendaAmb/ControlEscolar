<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'intention_letter',
        'recommendation_letter',
    ];
    
    /**
     * Obten los documentos requeridos por tipo.
     *
     * @param  mixed $query
     * @param  mixed $type
     * @return void
     */
    public static function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Obtiene los expedientes, asociados al documento requerido.
     *
     * @return void
     */
    public function archives()
    {
        return $this->belongsToMany(Archive::class);
    }
}
