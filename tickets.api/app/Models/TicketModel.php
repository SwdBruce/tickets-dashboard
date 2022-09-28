<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;

    const CREADO = 1;
    const EN_PROCESO = 2;
    const CERRADO = 0;

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
}
