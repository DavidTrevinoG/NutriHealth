<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentario';  // Define la tabla correspondiente

    protected $primaryKey = 'id_comentario';  // Define la clave primaria

    protected $fillable = [
        'id_publicacion',
        'comentario',
        'id_usuario',
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }

    public function comentariosDeComentario()
    {
        return $this->hasMany(ComentarioDeComentario::class, 'id_comentario');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');  // Suponiendo que tienes un modelo de usuario
    }
}
