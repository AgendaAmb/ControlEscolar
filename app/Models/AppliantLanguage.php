<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AppliantLanguage extends Model
{
    use HasFactory;

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
     * @return void
     */
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
}
