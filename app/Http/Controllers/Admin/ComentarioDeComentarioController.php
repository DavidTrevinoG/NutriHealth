<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComentarioDeComentario;
use App\Models\Comentario;
use App\Models\Publicacion;

class ComentarioDeComentarioController extends Controller
{


    public function destroy($id)
    {
        $reply = ComentarioDeComentario::findOrFail($id);
        $comentario = Comentario::findOrFail($reply->id_comentario);
        $publicacion = Publicacion::findOrFail($comentario->id_publicacion);
        $reply->delete();
        return redirect()->route('admin.publicaciones.show', $publicacion->id_publicacion)->with('success', 'Respuesta eliminada.');
    }
}
