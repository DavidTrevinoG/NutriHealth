<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comentario;

class CommentController extends Controller
{

    public function destroy($id)
    {
        $reply = Comentario::findOrFail($id);
        $id_pub = $reply->id_publicacion;
        $reply->delete();
        return redirect()->route('admin.publicaciones.show', $id_pub)->with('success', 'Respuesta eliminada.');
    }
}
