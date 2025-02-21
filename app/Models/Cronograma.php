<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'tema_exposicion',
        'lugar',
        'descripcion',
        'dia',
        'dia_numero',
        'mes',
        'hora_inicio',
        'hora_fin',
        'foto',
    ];
}
