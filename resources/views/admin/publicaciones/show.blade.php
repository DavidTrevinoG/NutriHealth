<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Publicación') }}
        </h2>
    </x-slot>
    <br>
    <div class="container mx-auto">
         <!-- Back to Posts Link -->
         <a href="{{ route('admin.publicaciones.index') }}" class="text-blue-500 hover:underline flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Volver a las publicaciones
        </a>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h4 class="text-lg font-semibold mb-3">{{ $post->usuario->name }} - {{ $post->created_at->format('d M Y') }}</h4>
            <p class="text-gray-800 mb-4">{{ $post->cuerpo }}</p>

            <h6 class="text-lg font-semibold mb-2">Comentarios</h6>
            @if($post->comentarios && $post->comentarios->count())
                @foreach($post->comentarios as $comment)
                    <div class="border-t pt-4 mt-4">
                        <h5 class="font-semibold">{{ $comment->usuario->name }}</h5>
                        <p class="text-gray-600">{{ $comment->comentario }}</p>
                        <form action="{{ route('admin.comentarios.destroy', $comment->id_comentario) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar Comentario</button>
                        </form>

                        <!-- Comentarios de Comentarios -->
                        @if($comment->comentariosDeComentario && $comment->comentariosDeComentario->count())
                            <div class="pl-4 mt-2 border-l border-gray-300">
                                <h6 class="text-lg font-semibold mb-2">Respuestas</h6>
                                @foreach($comment->comentariosDeComentario as $reply)
                                    <div class="border-t pt-4 mt-4">
                                        <h6 class="font-semibold">{{ $reply->usuario->name }}</h6>
                                        <p class="text-gray-600">{{ $reply->comentario }}</p>
                                        <form action="{{ route('admin.respuestas.destroy', $reply->id_comentario_comentario) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Eliminar Respuesta</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <p>No hay comentarios disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>
