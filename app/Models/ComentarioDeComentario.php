<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioDeComentario extends Model
{
    use HasFactory;

    protected $table = 'comentario_de_comentario';

    protected $primaryKey = 'id_comentario_comentario';

    protected $fillable = [
        'id_comentario',
        'comentario',
        'id_usuario',
    ];

    // Relación muchos a uno con Comentario
    public function comentario()
    {
        return $this->belongsTo(Comentario::class, 'id_comentario');
    }
}
