<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentario';

    protected $primaryKey = 'id_comentario';

    protected $fillable = [
        'id_publicacion',
        'comentario',
        'id_usuario',
    ];

    // Relación uno a muchos con ComentarioDeComentario
    public function comentarioDeComentarios()
    {
        return $this->hasMany(ComentarioDeComentario::class, 'id_comentario');
    }

    // Relación muchos a uno con Publicacion
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }
}
