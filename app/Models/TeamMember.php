<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
 
    // Campos asignables en masa
    protected $fillable = [
        'name',
        'role',
        'team',
        'twitter',
        'linkedin',
       'bio',
       'details',
        'image',
    ];

    // Accesor para obtener la URL de la imagen
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('default-image.jpg');
    }
}
