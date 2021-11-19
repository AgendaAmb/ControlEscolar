<?php

namespace App\Models;

use App\Events\UserRetrieved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable, SoftDeletes;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public const TYPES = [
        'students' => 'App\\Models\\Auth\\Student',
        'workers' => 'App\\Models\\Auth\\Worker',
        'externs' => 'App\\Models\\Auth\\Extern'
    ];

     /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'retrieved' => UserRetrieved::class,
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Available gender choices.
     *
     * @var array
     */
    public const GENDER_CHOICES = [
        'Masculino' => 'Masculino',
        'Femenino' => 'Femenino',
        'Otros' => 'Otro',
        'No especificar' => 'NoEspecificar'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return Builder
     */
    public static function scopeAppliant(Builder $query): Builder
    {
        return $query->whereHas('roles', fn($q) => $q->whereIn('name', [
            'aspirante_local',
            'aspirante_foraneo',
            'aspirante_extranjero'
        ]));
    }

    /**
     * The "booted" method of the model.
     *
     * @return Builder
     */
    public static function scopeWorker(Builder $query): Builder
    {
        return $query->whereHas('roles', fn($q) => $q->whereIn('name', [
            'admin',
            'profesor_nb',
            'personal_apoyo',
            'control_escolar'
        ]));
    }

    /**
     * The "booted" method of the model.
     *
     * @return Builder
     */
    public static function scopeHasArchive(Builder $query): Builder
    {
        return $query->has('archives');
    }

    /**
     * The "booted" method of the model.
     *
     * @return bool
     */
    public function isAppliant(): bool
    {
        return $this->hasAnyRole(['aspirante_local','aspirante_foraneo','aspirante_extranjero']);
    }

    /**
     * The "booted" method of the model.
     *
     * @return bool
     */
    public function isWorker(): bool
    {
        return $this->hasAnyRole(['profesor_nb','control_escolar','personal_apoyo','admin']);
    }

    /**
     * The "booted" method of the model.
     *
     * @return Builder
     */
    public static function scopeNoInterviews(Builder $query): Builder
    {
        return $query->doesntHave('interviews');
    }

    /**
     * A model may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'model_has_roles',
            'model_id',
            'role_id',
            'id',
            'id'
        )->select('id', 'name');
    }

    /**
     * A model may have multiple academic areas.
     */
    public function academicAreas(): BelongsToMany
    {
        return $this->belongsToMany(AcademicArea::class);
    }

    /**
     * A model may have multiple academic areas.
     */
    public function academicEntities(): BelongsToMany
    {
        return $this->belongsToMany(AcademicEntity::class);
    }

    /**
     * A model may have multiple academic areas.
     */
    public function academicComittes(): BelongsToMany
    {
        return $this->belongsToMany(AcademicComitte::class);
    }

    /**
     * A model may have multiple academic areas.
     */
    public function latestArchive(): HasOne
    {
        return $this->hasOne(Archive::class, 'user_id', 'id')->latestOfMany();
    }

    /**
     * A model may have multiple academic areas.
     */
    public function archives(): HasMany
    {
        return $this->hasMany(Archive::class, 'user_id', 'id');
    }

    /**
     * Obtiene los usuarios de la entrevista.
     *
     * @return BelongsToMany
     */
    public function interviews(): BelongsToMany
    {
        return $this->belongsToMany(Interview::class);
    }
    
    /**
     * Obtiene las cartas de intención, otorgadas por el usuario..
     *
     * @return HasMany
     */
    public function intentionLetters(): HasMany
    {
        return $this->hasMany(IntentionLetter::class);
    }

    /**
     * Assign the given role to the model.
     *
     * @param array|string|int|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function assignRole(...$roles): void
    {
        foreach ($roles as $role)
        {
            if (is_int($role))
                $this->roles()->attach($role, ['model_type' => $this->type]);

            else if(is_string($role))
            {
                $role_id = Role::where('name', $role)->value('id');
                $this->roles()->attach($role_id, ['model_type' => $this->type]);
            }
        }
    }

    /**
     * Determina si el usuario es un postulante.
     *
     * @return 
     */
    public function getIsAppliantAttribute()
    {
        return $this->hasAnyRole(['aspirante_local','aspirante_foraneo','aspirante_extranjero']);
    }
}