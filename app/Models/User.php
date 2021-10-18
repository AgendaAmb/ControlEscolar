<?php

namespace App\Models;

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
     * @return void
     */
    protected static function booted()
    {
        static::retrieved(function ($user) {
            $user->load([
                'roles' => fn($q) => $q->select('id','name')->where('model_type', $user->type),
                'latestArchive' => fn($q) => $q->where('user_type', $user->type),
            ]);
        });
    }

    /**
     * The "booted" method of the model.
     *
     * @return Builder
     */
    public static function scopeAppliant(Builder $query): Builder
    {
        return $query->whereHas('roles', fn($q) => $q->whereIn('name', ['aspirante_local','aspirante_foraneo','aspirante_extranjero']));
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
        );
    }

    /**
     * A model may have multiple academic areas.
     */
    public function academicAreas(): BelongsToMany
    {
        return $this->belongsToMany(AcademicArea::class)->wherePivot('user_type', $this->type);
    }

    /**
     * A model may have multiple academic areas.
     */
    public function academicEntities(): BelongsToMany
    {
        return $this->belongsToMany(AcademicEntity::class)->wherePivot('user_type', $this->type);
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
}