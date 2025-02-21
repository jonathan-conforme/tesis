<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponencia extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'titulo', 'autor', 'archivo', 'descripcion', 'tematica', 'imagen_pago', 'estado', 'correo', 'telefono', 'universidad', 'modo_participacion', 'observaciones',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profesor()
{
    return $this->hasOne(Profesor::class, 'tematica', 'tematica');
}
public function puedeReemplazar(&$fechaEntrega = null)
{
    if ($this->estado !== 'rechazado') {
        $fechaEntrega = null; // No aplica tiempo restante si no está rechazado
        return false;
    }

    // Asumimos que "updated_at" se actualiza cuando se rechaza la ponencia
    $fechaEntrega = $this->updated_at->addDays(1);
    // Calcula el tiempo restante en un formato legible
    if (now()->lessThan($fechaEntrega)) {
        $fechaEntrega = $fechaEntrega->isoFormat('D MMM YYYY, HH:mm');
        return true;
    }

    $fechaEntrega = 'Tiempo expirado';
    return false;
}
}
