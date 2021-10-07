<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScientificProduction extends Model
{
    use HasFactory, SoftDeletes;

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
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Obtiene las producciones científicas, referentes 
     * a publicación de artículos.
     *
     */
    public function scopeArticles($query)
    {
        $query->join('articles', 'articles.scientific_production_id', '=', 'scientific_productions.id');

        return $query;
    }

    /**
     * Obtiene las producciones científicas, referentes 
     * a publicación de capítulos.
     *
     */
    public function scopePublishedChapters($query)
    {
        $query->join('published_chapters', 'published_chapters.scientific_production_id', '=', 'scientific_productions.id');

        return $query;
    }

    /**
     * Obtiene las producciones científicas, referentes 
     * a publicación de reportes técnicos.
     *
     */
    public function scopeTechnicalReports($query)
    {
        $query->join('technical_reports', 'technical_reports.scientific_production_id', '=', 'scientific_productions.id');

        return $query;
    }

    /**
     * Obtiene las producciones científicas, referentes 
     * a publicación de reportes técnicos.
     *
     */
    public function scopeWorkingMemories($query)
    {
        $query->join('working_memories', 'working_memories.scientific_production_id', '=', 'scientific_productions.id');

        return $query;
    }

    /**
     * Obtiene las producciones científicas, referentes 
     * a publicación de reportes técnicos.
     *
     */
    public function scopeWorkingDocuments($query)
    {
        $query->join('working_documents', 'working_documents.scientific_production_id', '=', 'scientific_productions.id');

        return $query;
    }

    /**
     * Obtiene otros autores de la producción científica.
     */
    public function authors()
    {
        return $this->hasMany(Author::class);
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
