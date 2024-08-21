<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Comentario') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h4 class="text-lg font-semibold mb-3">Comentario de {{ $comment->usuario->name }} - {{ $comment->created_at->format('d M Y') }}</h4>
            <p class="text-gray-800 mb-4">{{ $comment->comentario }}</p>

            <h6 class="text-lg font-semibold mb-2">Respuestas</h6>
            @if($comment->replies->count())
                @foreach($comment->replies as $reply)
                    <div class="border-t pt-4 mt-4">
                        <h5 class="font-semibold">{{ $reply->usuario->name }}</h5>
                        <p class="text-gray-600">{{ $reply->respuesta }}</p>
                        <form action="{{ route('admin.replies.destroy', $reply->id_repuesta) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar Respuesta</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p>No hay respuestas disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>
