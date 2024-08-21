<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Tipos de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                <a href="{{ route('admin.tipo-ejercicio.create') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                   <i class="bi bi-plus-circle mr-1"></i> Crear Nuevo Tipo de Ejercicio
                </a>

                <!-- Tabla de Tipos de Ejercicio -->
                <div class="mt-8 bg-white shadow sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-center mb-4">Tipos de Ejercicio</h3>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                        <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                            <tr class="custom-border">
                                <th scope="col" class="px-6 py-3 custom-border text-center">Nombre</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tiposEjercicio as $tipo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $tipo->nombre_tipo }}</td>
                                    <td class="table-actions text-center">
                                        <a href="{{ route('admin.tipo-ejercicio.edit', $tipo->id_tipo) }}" class="text-blue-500 hover:text-blue-700 mr-2">Editar</a>
                                        <form action="{{ route('admin.tipo-ejercicio.destroy', $tipo->id_tipo) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro de eliminar este tipo de ejercicio?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-2 text-center text-gray-500">No hay tipos de ejercicio disponibles.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6 flex justify-center">
                    {{ $tiposEjercicio->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
