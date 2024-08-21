<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_ejercicio',
        'duracion',
        'descripcion',
        'id_tipo',
    ];

    public $timestamps = true;


    // Relación muchos a uno con TipoEjercicio
    public function tipoEjercicio()
    {
        return $this->belongsTo(TipoEjercicio::class, 'id_tipo');
    }
}
