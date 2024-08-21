<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la publicación') }}
        </h2>
    </x-slot>
    <br>
    <div class="container">
        <!-- Back to Posts Link -->
        <a href="{{ route('usuarios.posts.index') }}" class="text-blue-500 hover:underline flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Volver a las publicaciones
        </a>
        <div class="row">
            <!-- Display post -->
            <div class="col-md-12 mb-4">
                <div class="bg-white shadow-md rounded-lg p-4">
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
                            <h3 class="text-lg font-semibold">{{ $post->titulo }}</h3>
                            <h5 class="text-mb font-semibold">{{ $post->usuario->name }}</h5>
                            <p class="text-gray-600 text-sm">{{ $post->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-800">{{ $post->cuerpo }}</p>
                </div>
            </div>

            <!-- Display comments -->
            <div class="col-md-12">
                <h4 class="text-lg font-semibold mb-3">Comentarios</h4>
                @foreach ($post->comentarios as $comentario)
                    <div class="bg-white shadow-md rounded-lg mb-4 p-4">
                        <div class="flex items-start mb-3">
                            @if ($comentario->usuario->profile_photo)
                                <img class="w-12 h-12 rounded-full mr-3"
                                    src="../../{{ $comentario->usuario->profile_photo }}"
                                    alt="{{ $comentario->usuario->name }}">
                            @else
                                <svg class="w-12 h-12 rounded-full bg-gray-300 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="none"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M12 14c3.313 0 6-2.687 6-6s-2.687-6-6-6S6 4.687 6 8s2.687 6 6 6zM12 15c-4.418 0-8 2.686-8 6v1h16v-1c0-3.314-3.582-6-8-6z" />
                                </svg>
                            @endif
                            <div>
                                <h5 class="text-md font-semibold">{{ $comentario->usuario->name }}</h5>
                                <p class="text-gray-600 text-sm">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>
                                <p class="text-gray-800">{{ $comentario->comentario }}</p>

                                <!-- Display replies to comments -->
                                @foreach ($comentario->comentariosDeComentario as $reply)
                                    <div class="bg-gray-100 p-2 rounded-lg mt-2">
                                        <div class="flex items-start mb-3">
                                            @if ($reply->usuario->profile_photo)
                                                <img class="w-8 h-8 rounded-full mr-3"
                                                    src="../../{{ $reply->usuario->profile_photo }}"
                                                    alt="{{ $reply->usuario->name }}">
                                            @else
                                                <svg class="w-8 h-8 rounded-full bg-gray-300 text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"
                                                    fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3"
                                                        d="M12 14c3.313 0 6-2.687 6-6s-2.687-6-6-6S6 4.687 6 8s2.687 6 6 6zM12 15c-4.418 0-8 2.686-8 6v1h16v-1c0-3.314-3.582-6-8-6z" />
                                                </svg>
                                            @endif
                                            <div>
                                                <h5 class="text-md font-semibold">{{ $reply->usuario->name }}</h5>
                                                <p class="text-gray-600 text-sm">
                                                    {{ $reply->created_at->diffForHumans() }}
                                                </p>
                                                <p class="text-gray-800">{{ $reply->comentario }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Form to reply to a comment -->
                                <form method="POST"
                                    action="{{ route('usuarios.comments.reply.store', $comentario->id_comentario) }}">
                                    @csrf
                                    <textarea name="comentario" placeholder="Responder al comentario..." rows="2" class="form-input w-full" required></textarea>
                                    <button type="submit"
                                        class="mt-2 bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Responder</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Form to add a new comment -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h4 class="text-lg font-semibold mb-3">Agregar un comentario</h4>
                    <form method="POST" action="{{ route('usuarios.comments.store', $post->id_publicacion) }}">
                        @csrf
                        <textarea name="comentario" placeholder="Escribe tu comentario aquí..." rows="4" class="form-input w-full"
                            required></textarea>
                        <button type="submit"
                            class="mt-2 bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
