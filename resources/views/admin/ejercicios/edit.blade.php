<x-app-layout>

<div class="p-6 sm:ml-60">
    <div class="text-gray-900">
        <div class="bg-white shadow rounded-lg overflow-hidden mb-4">
            <div class="bg-gray-100 px-4 py-2 flex justify-between items-center font-semibold text-gray-700">
                <h5 class="font-bold text-gray-900">Editar Ejercicio</h5>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
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

                <form action="{{ route('admin.ejercicios.update', $ejercicio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nombre_ejercicio" class="block text-gray-700 font-semibold mb-2">Nombre del Ejercicio</label>
                        <input type="text" name="nombre_ejercicio" id="nombre_ejercicio" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('nombre_ejercicio', $ejercicio->nombre_ejercicio) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="duracion" class="block text-gray-700 font-semibold mb-2">Duración (en minutos)</label>
                        <input type="number" name="duracion" id="duracion" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('duracion', $ejercicio->duracion) }}">
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('descripcion', $ejercicio->descripcion) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="id_tipo" class="block text-gray-700 font-semibold mb-2">Tipo de Ejercicio</label>
                        <select name="id_tipo" id="id_tipo" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Seleccionar Tipo</option>
                            @foreach ($tiposEjercicio as $tipo)
                                <option value="{{ $tipo->id_tipo }}" {{ old('id_tipo', $ejercicio->id_tipo) == $tipo->id_tipo ? 'selected' : '' }}>
                                    {{ $tipo->nombre_tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="dificultad" class="block text-gray-700 font-semibold mb-2">Dificultad</label>
                        <input type="text" name="dificultad" id="dificultad" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('dificultad', $ejercicio->dificultad) }}">
                    </div>

                    <div class="mb-4">
                        <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @if ($ejercicio->imagen)
                            <img src="{{ asset($ejercicio->imagen) }}" alt="Imagen del Ejercicio" class="mt-2 max-w-full h-auto">
                        @endif
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('admin.ejercicios.index') }}" class="btn btn-danger text-white text-sm font-medium rounded transition duration-150 my-2">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">Actualizar Ejercicio</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
