<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioDeComentario extends Model
{
    use HasFactory;

    protected $table = 'comentario_de_comentario';  // Define la tabla correspondiente

    protected $primaryKey = 'id_comentario_comentario';  // Define la clave primaria

    protected $fillable = [
        'id_comentario',
        'comentario',
        'id_usuario',
    ];

    public function comentario()
    {
        return $this->belongsTo(Comentario::class, 'id_comentario');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');  // Suponiendo que tienes un modelo de usuario
    }
}
