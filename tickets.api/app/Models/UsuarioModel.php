<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsuarioModel extends Authenticatable  implements JWTSubject
{
    use Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_SUPPORT = 2;
    const ROLE_USER = 3;
    const DESCRIBE_ROLE = [
        self::ROLE_ADMIN => 'Administrador',
        self::ROLE_SUPPORT => 'Soporte',
        self::ROLE_USER => 'Usuarios'
    ];

    const AREA_ADMINISTRATIVA = 1;
    const AREA_SOPORTE = 2;
    const AREA_COMERCIAL = 3;
    const AREA_OPERACIONES = 4;
    const AREA_SISTEMAS = 5;
    const AREA_RECURSOS_HUMANOS = 6;
    const DESCRIBE_AREA = [
        self::AREA_ADMINISTRATIVA => 'Administrativa',
        self::AREA_SOPORTE => 'Soporte',
        self::AREA_COMERCIAL => 'Comercial',
        self::AREA_OPERACIONES => 'Operaciones',
        self::AREA_SISTEMAS => 'Sistemas',
        self::AREA_RECURSOS_HUMANOS => 'Recursos Humanos'
    ];

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'apellidos',
        'nombres',
        'sexo',
        'estado',
        'rol_id',
        'area_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function area(): BelongsTo
    {
        return $this->belongsTo(AreaModel::class, 'area_id');
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(RolModel::class, 'rol_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
