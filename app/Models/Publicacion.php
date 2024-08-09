<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicacion';

    protected $primaryKey = 'id_publicacion';

    protected $fillable = [
        'titulo',
        'cuerpo',
        'likes',
        'id_usuario',
    ];

    // Relación uno a muchos con Comentario
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_publicacion');
    }
}
