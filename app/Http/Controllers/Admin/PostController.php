<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;

class PostController extends Controller
{
    public function index()
    {
        $posts = Publicacion::with('usuario', 'comentarios')->latest()->paginate(10);
        return view('admin.publicaciones.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Publicacion::with('comentarios')->findOrFail($id);
        return view('admin.publicaciones.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Publicacion::findOrfail($id);
        $post->delete();
        return redirect()->route('admin.publicaciones.index')->with('success', 'Publicación eliminada.');
    }
}
