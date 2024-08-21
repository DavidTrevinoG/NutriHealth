<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEjercicio extends Model
{
    use HasFactory;

    protected $table = 'tipo_ejercicio';

    protected $primaryKey = 'id_tipo';

    public $timestamps = true;


    protected $fillable = [
        'nombre_tipo',
    ];

    // Relación uno a muchos con Ejercicio
    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'id_tipo');
    }
}
