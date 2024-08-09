<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    protected $fillable = [
        'nombre_ingrediente',
        'cantidad',
        'id_colacion',
    ];

    // Relación muchos a uno con Colacion
    public function colacion()
    {
        return $this->belongsTo(Colacion::class, 'id_colacion');
    }
}
