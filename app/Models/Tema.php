<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_principal',
        'fecha_inicio',
        'fecha_fin',
        'canton',
        'ciudad',
        'subtema',
    ];
}
