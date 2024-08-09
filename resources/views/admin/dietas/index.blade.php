<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('X') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.dietas.create') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-rosado btn-rubi-rosado:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                   <i class="bi bi-plus-circle mr-1"></i> Agregar Nueva dieta
                </a>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <!-- Tabla de Dietas -->
    <h2 class="text-2xl font-bold mb-4">Listado de Dietas</h2>
    <a href="{{ route('admin.dietas.create') }}" class="btn btn-primary mb-3">Agregar Dieta</a>

    <h3 class="text-xl font-semibold mt-6">Dietas</h3>
    <table class="w-full text-sm text-left text-gray-500 bg-gray-50">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Colación 1</th>
                <th class="px-6 py-3">Colación 2</th>
                <th class="px-6 py-3">Colación 3</th>
                <th class="px-6 py-3">Colación 4</th>
                <th class="px-6 py-3">Colación 5</th>
                <th class="px-6 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dietas as $dieta)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $dieta->id }}</td>
                <td class="px-6 py-4">{{ $dieta->colacion1 }}</td>
                <td class="px-6 py-4">{{ $dieta->colacion2 }}</td>
                <td class="px-6 py-4">{{ $dieta->colacion3 }}</td>
                <td class="px-6 py-4">{{ $dieta->colacion4 }}</td>
                <td class="px-6 py-4">{{ $dieta->colacion5 }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('dietas.colaciones', $dieta->id) }}" class="text-blue-600 hover:underline">Colaciones</a>
                    <a href="{{ route('dietas.edit', $dieta->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <a href="{{ route('dietas.destroy', $dieta->id) }}" class="text-red-600 hover:underline">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabla de Colaciones -->
    <h3 class="text-xl font-semibold mt-6">Colaciones</h3>
    <table class="w-full text-sm text-left text-gray-500 bg-gray-50">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Imagen</th>
                <th class="px-6 py-3">Calorías</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaciones as $colacion)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $colacion->id }}</td>
                <td class="px-6 py-4">{{ $colacion->nombre_colacion }}</td>
                <td class="px-6 py-4"><img src="{{ asset('imagen/dietas/' . $colacion->imagen) }}" width="50"></td>
                <td class="px-6 py-4">{{ $colacion->calorias }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabla de Ingredientes -->
    <h3 class="text-xl font-semibold mt-6">Ingredientes</h3>
    <table class="w-full text-sm text-left text-gray-500 bg-gray-50">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Cantidad</th>
                <th class="px-6 py-3">ID Colación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes as $ingrediente)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $ingrediente->id }}</td>
                <td class="px-6 py-4">{{ $ingrediente->nombre_ingrediente }}</td>
                <td class="px-6 py-4">{{ $ingrediente->cantidad }}</td>
                <td class="px-6 py-4">{{ $ingrediente->id_colacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</x-app-layout>
