<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class AcademicProgram extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Scopes model eager loads.
     *
     * @return Builder
     */
    public static function scopeWithInterviewEagerLoads(Builder $query): Builder
    {
        return $query->with('periods', function($query){

            $query->with('announcement.archives.appliant', function($subquery){
                $subquery->doesntHave('interviews');
            })->with('interviews.intentionLetterProfessor', function($subquery){

                $subquery->where('archive_intention_letter.user_id', '<>', Auth::id());
            })->with([
                'announcement.archives.intentionLetter',
                'rooms'
            ])->where('finished', false);/*->whereYear('end_date', '<=', date('Y'))
            ->whereMonth('end_date', '<=', date('m'))*/;
        
        })->with('latestAnnouncement');
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Obtiene la fecha de convocatoria mas antigua
     *
     * @return HasMany
     */
    public function oldestAnnouncement(): HasOne
    {
        return $this->hasOne(Announcement::class)->oldestOfMany();
    }

    /**
     * Obtiene la fecha de convocatoria mas reciente
     *
     * @return HasMany
     */
    public function latestAnnouncement(): HasOne
    {
        return $this->hasOne(Announcement::class)
            ->latestOfMany()
            ->select('announcements.*', 'academic_programs.name as name')
            ->join('academic_programs', 'academic_programs.id', 'academic_program_id');
    }

    /**
     * Obtiene los documentos requeridos del expediente.
     *
     * @return HasMany
     */
    public function requiredDocuments(): BelongsToMany
    {
        return $this->belongsToMany(RequiredDocument::class);
    }

    /**
     * Obtiene los periodos de entrevista del programa académico.
     *
     * @return HasMany
     */
    public function periods(): HasManyThrough
    {
        return $this->hasManyThrough(Period::class, Announcement::class);
    }

    /**
     * Obtiene los periodos de entrevista del programa académico.
     *
     * @return HasMany
     */
    public function latestPeriod(): HasOneThrough
    {
        return $this->hasOneThrough(Period::class, Announcement::class)->latestOfMany();
    }
}
