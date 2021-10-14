<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'type',
    ];

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
        )->wherePivot('model_type', $this->type);
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
                $role_id = Role::where('name', $role)->where('guard_name', $this->guard_name)->value('id');
                $this->roles()->attach($role_id, ['model_type' => $this->type]);
            }
        }
    }

}
