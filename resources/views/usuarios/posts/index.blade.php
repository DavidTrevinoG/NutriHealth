<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        <div class="row">
            <!-- Create Post Section -->
            <div class="col-md-12 mb-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h4 class="text-lg font-semibold mb-3">Crear una nueva publicación</h4>
                    <form method="POST" action="{{ route('usuarios.posts.store') }}">
                        @csrf
                        <input type="text" name="titulo" id="titulo" placeholder="Título"
                            class="form-input w-full" required>
                        <textarea name="cuerpo" id="cuerpo" placeholder="Escribe tu publicación aquí..." rows="4"
                            class="form-input w-full" required></textarea>
                        <button type="submit"
                            class="mt-2 bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Publicar</button>
                    </form>
                </div>
            </div>

            <!-- Filter Posts by Title -->
            <div class="col-md-12 mb-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h4 class="text-lg font-semibold mb-3">Filtrar publicaciones por título</h4>
                    <input type="text" id="search" placeholder="Buscar por título..." class="form-input w-full">
                </div>
            </div>

            <!-- Posts Section -->
            @foreach ($posts as $post)
                <div class="col-md-12 post-item">
                    <div class="bg-white shadow-md rounded-lg mb-4 p-4">
                        <div class="flex items-center mb-4">
                            <!-- Rounded Image -->
                            @if ($post->usuario->profile_photo)
                                <img src="../../{{ $post->usuario->profile_photo }}" alt="Foto de perfil"
                                    class="w-12 h-12 rounded-full mr-2">
                            @else
                                <svg class="w-12 h-12 rounded-full bg-gray-300 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="none"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M12 14c3.313 0 6-2.687 6-6s-2.687-6-6-6S6 4.687 6 8s2.687 6 6 6zM12 15c-4.418 0-8 2.686-8 6v1h16v-1c0-3.314-3.582-6-8-6z" />
                                </svg>
                            @endif
                            <div class="ml-3">
                                <h5 class="text-lg font-semibold post-title">{{ $post->titulo }}</h5>
                                <h5 class="text-mb font-semibold">{{ $post->usuario->name }}</h5>
                                <p class="text-gray-600 text-sm">{{ $post->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <p class="text-gray-800 mb-4">
                            {{ $post->cuerpo }}
                        </p>
                        <!-- Link to Post Details -->
                        <a href="{{ route('usuarios.posts.show', $post->id_publicacion) }}"
                            class="text-blue-500 hover:underline">Ver detalles y comentar</a>
                        <!-- Comments Section -->
                        <div class="border-t pt-4 mt-4">
                            <h6 class="text-lg font-semibold mb-2">Comentarios</h6>
                            @if ($post->comentarios)
                                @foreach ($post->comentarios as $comment)
                                    <div class="flex items-start mb-3">
                                        <img class="w-12 h-12 rounded-full mr-3"
                                            src="../../{{ $comment->usuario->profile_photo }}"
                                            alt="{{ $comment->usuario->name }}">
                                        <div>
                                            <h5 class="text-md font-semibold">{{ $comment->usuario->name }}</h5>
                                            <p class="text-gray-600 text-sm">
                                                {{ $comment->created_at->diffForHumans() }}</p>
                                            <p class="text-gray-800">{{ $comment->comentario }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No hay comentarios disponibles.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Filtrado en tiempo real
        document.getElementById('search').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let posts = document.querySelectorAll('.post-item');

            posts.forEach(function(post) {
                let title = post.querySelector('.post-title').textContent.toLowerCase();
                if (title.includes(searchValue)) {
                    post.style.display = '';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
