<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * Obtiene el documento requerido al cual el documento está asociado.
     *
     * @return void
     */
    public function requiredDocument()
    {
        return $this->belongsTo(RequiredDocument::class);
    }

    /**
     * Obtiene el expediente al cual el documento está asociado.
     *
     * @return void
     */
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
}
