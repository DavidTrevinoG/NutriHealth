<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comentarios del Admin') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h4 class="text-lg font-semibold mb-3">Todos los comentarios</h4>
            @if($comments->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publicación</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($comments as $comment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $comment->usuario->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $comment->publicacion->cuerpo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $comment->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.comentarios.show', $comment->id_comentario) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <form action="{{ route('admin.comentarios.destroy', $comment->id_comentario) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            @else
                <p>No hay comentarios disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>
