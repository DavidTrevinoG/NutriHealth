<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Respuestas del Admin') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h4 class="text-lg font-semibold mb-3">Todas las respuestas</h4>
            @if($replies->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comentario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($replies as $reply)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reply->usuario->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reply->comment->comentario }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reply->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.replies.destroy', $reply->id_repuesta) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $replies->links() }}
            @else
                <p>No hay respuestas disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>
