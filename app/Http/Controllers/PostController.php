<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Obtiene todas las publicaciones, ordenadas de más nuevas a más antiguas
        $posts = Publicacion::with('usuario', 'comentarios.usuario')->orderBy('created_at', 'desc')->get();

        return view('usuarios.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Publicacion::with('comentarios')->findOrFail($id);
        return view('usuarios.posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
        ]);

        Publicacion::create([
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'likes' => 0,  // Inicializar con 0 likes
            'id_usuario' => auth()->id(),  // Suponiendo que el usuario está autenticado
        ]);

        return redirect()->route('usuarios.posts.index');
    }
}

