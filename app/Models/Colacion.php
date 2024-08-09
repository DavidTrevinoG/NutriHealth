<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colacion extends Model
{
    use HasFactory;

    protected $table = 'colaciones';

    protected $fillable = [
        'nombre_colacion',
        'imagen',
        'calorias',
    ];

    // Relación uno a muchos con Ingredientes
    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class, 'id_colacion');
    }

    // Relación muchos a muchos con Dietas
    public function dietas()
    {
        return $this->belongsToMany(Dieta::class, 'dietas', 'colacion1', 'id_dieta')
                    ->orWhere('colacion2')
                    ->orWhere('colacion3')
                    ->orWhere('colacion4')
                    ->orWhere('colacion5');
    }
}
