<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicacion';  // Define la tabla correspondiente

    protected $primaryKey = 'id_publicacion';  // Define la clave primaria

    protected $fillable = [
        'titulo',
        'cuerpo',
        'likes',
        'id_usuario',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_publicacion');
    }

    // Define la relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    
}
