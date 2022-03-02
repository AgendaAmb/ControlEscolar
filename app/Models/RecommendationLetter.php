<?php

//Carta de recomendacion como archivo
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecommendationLetter extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $table = 'archive_recommendation_letter';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    
    // protected $fillable = [
    //     'location',
    //     'required_document_id',
    //     'rl_id',
    // ];

    /**
     * Relacion de clave primaria cn el archivo requerido
     *
     * @var array
     */
    // protected $primaryKey = ['required_document_id','rl_id'];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return BelongsTo
     */
    public function archiveRequiredDocument(): BelongsTo
    {
        return $this->belongsTo(ArchiveRequiredDocument::class);
    }

}