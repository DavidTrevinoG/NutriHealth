<x-app-layout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <!-- Botón de Regreso -->
            <div class="flex items-center py-4 md:py-8 flex-wrap justify-start">
                <a
                    href="{{ route('usuarios.ejercicios.indexUsuarios') }}"
                    class="text-blue-700 hover:text-white bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:bg-gray-900 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                >
                    Regresar a la lista de ejercicios
                </a>
            </div>

            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16 mt-6">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="{{ asset($ejercicio->imagen) }}" alt="{{ $ejercicio->nombre_ejercicio }}" />
                    <img class="w-full hidden dark:block" src="{{ asset($ejercicio->imagen) }}" alt="{{ $ejercicio->nombre_ejercicio }}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-black">
                        {{ $ejercicio->nombre_ejercicio }}
                    </h1>
                    <div class="mt-4 flex flex-col sm:flex-row sm:items-start sm:gap-4">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-black mb-2 sm:mb-0">
                            {{ $ejercicio->duracion }} minutos
                        </p>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg
                                        class="w-4 h-4 {{ $i < $ejercicio->dificultad ? 'text-yellow-300' : 'text-gray-300' }}"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                        />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
                                Dificultad: {{ $ejercicio->dificultad }}
                            </p>
                        </div>
                    </div>

                   

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $ejercicio->descripcion }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
