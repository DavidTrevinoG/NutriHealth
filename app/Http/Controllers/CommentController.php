<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\ComentarioDeComentario;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string',
        ]);

        Comentario::create([
            'id_publicacion' => $id,
            'comentario' => $request->comentario,
            'id_usuario' => auth()->id(),
        ]);

        return redirect()->route('usuarios.posts.show', $id);
    }

    public function storeReply(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string',
        ]);

        ComentarioDeComentario::create([
            'id_comentario' => $id,
            'comentario' => $request->comentario,
            'id_usuario' => auth()->id(),
        ]);

        return redirect()->back();
    }
}
