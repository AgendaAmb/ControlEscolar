<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    use HasFactory;
    
    /**
     * Obtiene los documentos requeridos del programa académico.
     *
     * @return void
     */
    public function requiredDocuments()
    {
        return $this->belongsToMany(RequiredDocument::class);
    }
}
