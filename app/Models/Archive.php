<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyTrought;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Environment\Environment;

class Archive extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id',
        'user_type',
        'comments',
        'motivation',
        'announcement_id',
        'status',
        'exanii_score',
        'who_check'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Une el nombre del programa académico con la convocatoria.
     *
     * @return QueryBuilder
     */
    public function scopeWhereAppliantDoesntHaveInterview(Builder $query): Builder
    {
        return $query->whereHas('appliant', function ($subquery) {
            $subquery->doesntHave('interviews');
        });
    }

    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function requiredDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class)->withPivot('location');
    }


    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function personalDocuments(): BelongsToMany
    {
        return $this->requiredDocuments()->where('type', 'personal');
    }

    

    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function enremDocuments(): BelongsToMany
    {
        return $this->requiredDocuments()->where('type', 'enrem');
    }


    /**
     * Obtiene los documentos personales requeridos del expediente.
     *
     * @return BelongsToMany
     */
    public function curricularDocuments(): BelongsToMany
    {
        return $this->requiredDocuments()->where('type', 'curricular');
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return BelongsToMany
     */
    public function entranceDocuments(): BelongsToMany
    {
        $query = $this->requiredDocuments()->where('type', 'entrance');
        return $query->orderBy('required_documents.name');
    }
        
    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return BelongsToMany
     */
    public function interviewDocuments(): BelongsToMany
    {        
      $query = $this->requiredDocuments()->where('type', 'interview');
        return $query->orderBy('required_documents.name');
    }


    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return HasMany
     */
    public function archiveRequiredDocuments(): HasMany
    {
        return $this->hasMany(ArchiveRequiredDocument::class);
    }

    /**
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return HasManyTrought
     */
    public function recommendationLetter(): HasManyThrough
    {
        return $this->hasManyThrough(RecommendationLetter::class, ArchiveRequiredDocument::class, 'archive_id', 'required_document_id');
    }


    /**1
     * Obtiene los documentos requeridos para el ingreso del
     * postulante, al programa académico.
     *
     * @return HasOneThrough
     */
    public function intentionLetter(): HasOneThrough
    {
        return $this->hasOneThrough(IntentionLetter::class, ArchiveRequiredDocument::class);
    }

    /**
     * archive->syncWithPivots()
     * Obtiene el postulante.
     *
     * @return BelongsTo
     */
    public function appliant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasMany
     */
    public function appliantLanguages(): HasMany
    {
        return $this->hasMany(AppliantLanguage::class);
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasMany
     */
    public function myRecommendationLetter(): HasMany
    {
        return $this->hasMany(MyRecommendationLetter::class);
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasMany
     */
    public function academicDegrees(): HasMany
    {
        return $this->hasMany(AcademicDegree::class);
    }

    /**
     * Obtiene las lénguas extranjeras del postulante.
     *
     * @return HasOne
     */
    public function latestAcademicDegree(): HasOne
    {
        return $this->hasOne(AcademicDegree::class)->latestOfMany();
    }

    /**
     * Obtiene las experiencias laborales del postulante.
     *
     * @return HasMany
     */
    public function appliantWorkingExperiences(): HasMany
    {
        return $this->hasMany(WorkingExperience::class);
    }

    /**
     * Obtiene las producciones científicas del postulante.
     *
     * @return HasMany
     */
    public function scientificProductions(): HasMany
    {
        return $this->hasMany(ScientificProduction::class)
            ->leftJoin('articles', 'scientific_productions.id', 'articles.scientific_production_id')
            ->leftJoin('published_chapters', 'scientific_productions.id', 'published_chapters.scientific_production_id')
            ->leftJoin('technical_reports', 'scientific_productions.id', 'technical_reports.scientific_production_id')
            ->leftJoin('working_memories', 'scientific_productions.id', 'working_memories.scientific_production_id')
            ->leftJoin('working_documents', 'scientific_productions.id', 'working_documents.scientific_production_id')
            ->leftJoin('reviews_cp', 'scientific_productions.id', 'reviews_cp.scientific_production_id');
    }

    /**
     * Obtiene los capitales humanos del postulante.
     *
     * @return HasMany
     */
    public function humanCapitals(): HasMany
    {
        return $this->hasMany(HumanCapital::class);
    }

    /**
     * Obtiene el programa académico, al cual corresponde
     * el expediente.
     *
     * @return BelongsTo
     */
    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }

    /**
     * enviroment related skills
     *
     * @return HasMany
     */
    public function enviromentRelatedSkills(): HasMany
    {
        return $this->HasMany(EnvironmentRelatedSkills::class);
    }

    /**
     * enviroment related skills
     *
     * @return HasMany
     */
    public function reasonsToChoise(): HasMany
    {
        return $this->HasMany(ReasonsToChoise::class);
    }

     /**
      * Address     *
     * @return HasMany
     */
    public function address(): HasMany
    {
        return $this->HasMany(Address::class);
    }

    /**
      * Address     *
     * @return HasMany
     */
    public function secondaryEducation(): HasMany
    {
        return $this->HasMany(SecondaryEducation::class);
    }

     /**
      * Future Plans     *
     * @return HasMany
     */
    public function futurePlans(): HasMany
    {
        return $this->HasMany(FuturePlans::class);
    }

     /**
      * Fields of interest     *
     * @return HasMany
     */
    public function fieldsOfInterest(): HasMany
    {
        return $this->HasMany(FieldsOfInterest::class);
    }


    /**
      * Fields of interest     *
     * @return HasMany
     */
    public function financingStudies(): HasMany
    {
        return $this->HasMany(FinancingStudies::class);
    }
    
    /**
      * Fields of interest     *
     * @return HasMany
     */
    public function recommendationLetterEnrem(): HasMany
    {
        return $this->HasMany(RecommendationLetterEnrem::class);
    }

    /**
      * Hear about program     *
     * @return HasMany
     */
    public function hearAboutProgram(): HasMany
    {
        return $this->HasMany(HearAboutProgram::class);
    }

    /**
     * Obtiene el programa académico, al cual corresponde
     * el expediente.
     *
     * @return HasMany
     */
    public function evaluationRubrics(): HasMany
    {
        return $this->hasMany(EvaluationRubric::class);
    }

    /**
     * Agrega una carta de intención al expediente.
     *
     * @param int $professor
     * @param object $intention_letter_content
     * 
     * @return IntentionLetter|bool
     */
    public function createOrUpdateIntentionLetter($professor, $intention_letter_content)
    {
        # Obtiene el id de la tabla pivote, asociada al documento requerido
        # que representa a la carta de intención
        $pivot_id = $this->archiveRequiredDocuments()->whereIsIntentionLetter()->value('id');

        # Asigna la ruta de la carta de intención y lo guarda en el sistema
        # de archivos.
        $path = implode('/', [
            'archives',
            $this->id,
            'entranceDocuments',
            'intention_letter.pdf'
        ]);

        Storage::put($path, $intention_letter_content);

        # Establece en la base de datos, la ubicación de la carta
        $this->archiveRequiredDocuments()
            ->whereIsIntentionLetter()
            ->update(['location' => $path]);

        # Si el pivote es nulo, no se agrega la carta de intención.
        if ($pivot_id === null)
            return false;

        # Asocia una nueva carta de intención con el expediente. Posteriormente
        # devuelve el modelo que representa a dicha carta y que está asociado
        # con el expediente.
        return $this->intentionLetter()->firstOrCreate([
            'archive_required_document_id' => $pivot_id,
            'user_id' => $professor,
            'user_type' => 'workers'
        ]);
    }

    /**
     * Agrega una carta de recomendación al expediente.
     * @param object $recommendation_letter
     */
    public function createRecommendationLetter($recommendation_letter_content)
    {
        # Busca el id de la carta de recomendación.
        $recommendation_letter_id = $this->archiveRequiredDocuments()
            ->whereNull('location')
            ->whereIsRecommendationLetter()
            ->limit(1)
            ->value('id');

        // # Ya se otorgaron las 2 cartas.
        // if ($recommendation_letter_id === null)
        //     return false;

        # Verifica la cantidad de cartas de recomendación otorgadas.
        $recommendation_letter_count = $this->archiveRequiredDocuments()
            ->whereNotNull('location')
            ->whereIsRecommendationLetter()
            ->count();

        //ya existen las dos cartas de recomendaion
        if ($recommendation_letter_count >= 2) {
            return false;
        }

        # Asigna la ruta de la carta de intención y lo guarda en el sistema
        # de archivos.
        $path = implode('/', [
            'archives',
            $this->id,
            'entranceDocuments',
            'recommendation_letter_',
            $recommendation_letter_count,
            '.pdf'
        ]);

        Storage::put($path, $recommendation_letter_content);

        # Guarda la carta de recomendación en la base de datos.
        $this->archiveRequiredDocuments()
            ->where('id', $recommendation_letter_id)
            ->update(['location' => $path]);

        return true;
    }
}
