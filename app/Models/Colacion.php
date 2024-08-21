<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colacion extends Model
{
    use HasFactory;

    protected $table = 'colaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;


    protected $fillable = [
        'nombre_colacion',
        'imagen',
    ];

    // Relación uno a muchos con Ingredientes
    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class, 'id_colacion');
    }
   
}
