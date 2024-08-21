<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';

    protected $fillable = [
        'nombre_ejercicio',
        'duracion',
        'descripcion',
        'id_tipo',
        'imagen',
        'dificultad',
    ];

    public $timestamps = true;

    // Relación muchos a uno con TipoEjercicio
    public function tipoEjercicio()
    {
        return $this->belongsTo(TipoEjercicio::class, 'id_tipo');
    }
}
