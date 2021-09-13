<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;

    /**
     * Eager loaded relationships.
     *
     * @var array
     */
    protected $with = ['documents'];
    
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
     * Obten los documentos asociados a el documento requerido.
     *
     * @param  mixed $query
     * @param  mixed $type
     * @return void
     */
    public function documents()
    {
        return $this->HasMany(Document::class);
    }
}
