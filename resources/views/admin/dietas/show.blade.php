<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la dieta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <a href="{{ route('admin.dietas.index') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                   <i class="bi bi-plus-circle mr-1"></i> Regresar a Dietas
                </a>
                <!-- Tabla de Colaciones -->
                <div class="mt-8 bg-white shadow sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-center mb-4">Colaciones</h3>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                        <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                            <tr class="custom-border">
                                <th scope="col" class="px-6 py-3 custom-border text-center">ID</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Nombre</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Imagen</th>
                                
                                <th scope="col" class="px-6 py-3 custom-border text-center">Calorías</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Ver Ingredientes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colaciones as $colacion)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $colacion->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $colacion->nombre_colacion }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center"><img src="{{ asset( $colacion->imagen) }}" width="80"></td>

                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $colacion->calorias }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                    <a href="{{ route('admin.colaciones.show', $colacion->id) }}" class="btn btn-sm btn-info text-white">Ver Ingredientes</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
