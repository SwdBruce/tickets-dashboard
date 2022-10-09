<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketModel extends Model
{
    use HasFactory;

    const CREADO = 1;
    const PROCESADO = 2;
    const CERRADO = 0;
    const INCIDENCIA = 1;
    const CONSULTA = 2;
    const GENERAL = 3;
    const URGENCIA_BAJA = 1;
    const URGENCIA_MEDIA = 2;
    const URGENCIA_ALTA = 3;
    const URGENCIA_URGENTE = 4;
    const IMPACTO_BAJO = 1;
    const IMPACTO_MEDIO = 2;
    const IMPACTO_ALTO = 3;
    const IMPACTO_CRITICO = 4;

    const DESCRIBE_TIPO_TICKET = [
        self::INCIDENCIA => 'Incidencia',
        self::CONSULTA => 'Consulta',
        self::GENERAL => 'General'
    ];
    const DESCRIBE_URGENCIA = [
        self::URGENCIA_BAJA => 'Baja',
        self::URGENCIA_MEDIA => 'Media',
        self::URGENCIA_ALTA => 'Alta',
        self::URGENCIA_URGENTE => 'Urgente'
    ];
    const DESCRIBE_IMPACTO = [
        self::IMPACTO_BAJO => 'Bajo',
        self::IMPACTO_MEDIO => 'Medio',
        self::IMPACTO_ALTO => 'Alto',
        self::IMPACTO_CRITICO => 'Crítico'
    ];
    const DESCRIBE_ESTADO = [
        self::CREADO => 'Creado',
        self::PROCESADO => 'En proceso',
        self::CERRADO => 'Cerrado'
    ];

    protected $table = 'ticket';
    protected $fillable = [
        'titulo',
        'descripcion',
        'usuario_id',
        'asignado_id',
        'categoria_id',
        'area_id',
        'estado'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo('App\Models\UsuarioModel', 'usuario_id');
    }

    public function asignado(): BelongsTo
    {
        return $this->belongsTo('App\Models\UsuarioModel', 'asignado_id');
    }
}
