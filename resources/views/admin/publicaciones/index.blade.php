<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones del Admin') }}
        </h2>
    </x-slot>
    <br>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h4 class="text-lg font-semibold mb-3">Todas las publicaciones</h4>
            @if($posts->count())
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                    <tr class="custom-border">
                        <th scope="col" class="px-6 py-3 custom-border text-center">Usuario</th>
                        <th scope="col" class="px-6 py-3 custom-border text-center">Titulo</th>
                        <th scope="col" class="px-6 py-3 custom-border text-center">Fecha</th>
                        <th scope="col" class="px-6 py-3 custom-border text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr class="custom-border">
                            <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $post->usuario->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $post->titulo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                <a href="{{ route('admin.publicaciones.show', $post->id_publicacion) }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                                <form action="{{ route('admin.publicaciones.destroy', $post->id_publicacion) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($posts->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-2 text-center text-gray-500">No hay publicaciones disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
                {{ $posts->links() }}
            @else
                <p>No hay publicaciones disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>
