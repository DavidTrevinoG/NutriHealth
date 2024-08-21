<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="px-4 py-2 flex justify-between items-center bg-gray-100 border-b border-gray-200">
                    <h5 class="font-bold text-gray-900 text-lg">Agregar Nuevo Ejercicio</h5>
                </div>

                <div class="p-4">
                    <!-- Mostrar mensajes de alerta -->
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.ejercicios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre_ejercicio" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                            <input type="text" id="nombre_ejercicio" name="nombre_ejercicio" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('nombre_ejercicio') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="duracion" class="block text-gray-700 font-semibold mb-2">Duración</label>
                            <input type="text" id="duracion" name="duracion" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('duracion') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="id_tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Ejercicio</label>
                            <select id="id_tipo" name="id_tipo" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                @foreach($tiposEjercicio as $tipo)
                                    <option value="{{ $tipo->id_tipo }}" {{ old('id_tipo') == $tipo->id_tipo ? 'selected' : '' }}>
                                        {{ $tipo->nombre_tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="dificultad" class="block text-gray-700 font-semibold mb-2">Dificultad</label>
                            <input type="text" id="dificultad" name="dificultad" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('dificultad') }}">
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen</label>
                            <input type="file" id="imagen" name="imagen" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('admin.ejercicios.index') }}" class="btn btn-danger text-white text-sm font-medium rounded transition duration-150 my-2">Cancelar</a>
                            <button type="submit" class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
