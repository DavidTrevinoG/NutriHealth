<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Ejercicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Éxito:</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <a href="{{ route('admin.ejercicios.create') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                   <i class="bi bi-plus-circle mr-1"></i> Agregar Nuevo Ejercicio
                </a>

                <!-- Tabla de Ejercicios -->
                <div class="mt-8 bg-white shadow sm:rounded-lg p-4 overflow-x-auto">
                    <h3 class="text-xl font-semibold text-center mb-4">Ejercicios</h3>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                        <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                            <tr class="custom-border">
                                <th class="px-4 py-3 custom-border text-center w-1/5">Nombre</th>
                                <th class="px-4 py-3 custom-border text-center w-1/5">Duración</th>
                                <th class="px-4 py-3 custom-border text-center w-1/3">Descripción</th>
                                <th class="px-4 py-3 custom-border text-center w-1/5">Tipo</th>
                                <th class="px-4 py-3 custom-border text-center w-1/3">Dificultad</th>
                                <th class="px-4 py-3 custom-border text-center w-1/5">Imagen</th>
                                <th class="px-4 py-3 custom-border text-center w-1/5">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ejercicios as $ejercicio)
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center truncate" title="{{ $ejercicio->nombre_ejercicio }}">{{ $ejercicio->nombre_ejercicio }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center truncate" title="{{ $ejercicio->duracion }}">{{ $ejercicio->duracion }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center truncate" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $ejercicio->descripcion }}">{{ $ejercicio->descripcion }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center truncate" title="{{ $ejercicio->tipoEjercicio->nombre_tipo ?? 'N/A' }}">{{ $ejercicio->tipoEjercicio->nombre_tipo ?? 'N/A' }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center truncate" title="{{ $ejercicio->dificultad ?? 'No especificada' }}">{{ $ejercicio->dificultad ?? 'No especificada' }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap custom-border text-center">
                                        @if ($ejercicio->imagen)
                                            <img src="{{ asset($ejercicio->imagen) }}" alt="Imagen" class="w-16 h-16 object-cover">
                                        @else
                                            Sin Imagen
                                        @endif
                                    </td>
                                    <td class="table-actions text-center">
                                        <a href="{{ route('admin.ejercicios.edit', $ejercicio->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Editar</a>
                                        <form action="{{ route('admin.ejercicios.destroy', $ejercicio->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro de eliminar este ejercicio?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-2 text-center text-gray-500">No hay ejercicios disponibles.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6 flex justify-center">
                    {{ $ejercicios->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Script para confirmación de eliminación con SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function eliminarEjercicio(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, redirigir a la ruta de eliminación
                    window.location.href = '/admin/ejercicios/' + id + '/eliminar';
                }
            });
        }
    </script>
</x-app-layout>
