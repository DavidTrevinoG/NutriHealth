<x-app-layout>
    <div class="container mb-5">
        <div class="row">
            <!-- Menú de tipos de ejercicios -->
            <div class="col-md-12 mb-4">
                <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                    <!-- Botón para mostrar todos los ejercicios -->
                    <a href="{{ route('usuarios.ejercicios.indexUsuarios') }}" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                        Todos
                    </a>
                    @foreach($tiposEjercicio as $tipo)
                        <a href="{{ route('usuarios.ejercicios.indexUsuarios', $tipo->id_tipo) }}" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                            {{ $tipo->nombre_tipo }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Mostrar ejercicios del tipo seleccionado o todos -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
            @foreach($ejercicios as $ejercicio)
                <a href="{{ route('usuarios.ejercicios.show', $ejercicio->id) }}" class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden flex flex-col">
                    <img class="w-full h-40 object-cover" src="{{ asset($ejercicio->imagen) }}" alt="{{ $ejercicio->nombre_ejercicio }}">
                    <div class="p-2">
                        <h3 class="text-lg font-bold mb-1">{{ $ejercicio->nombre_ejercicio }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ \Illuminate\Support\Str::limit($ejercicio->descripcion, 50) }}</p>
                        <!-- Mostrar el nivel de dificultad -->
                        <div class="flex items-center mt-2">
                            <span class="text-sm font-semibold mr-2">Dificultad:</span>
                            <x-star-rating :rating="$ejercicio->dificultad" />
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
