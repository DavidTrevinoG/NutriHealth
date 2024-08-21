<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Ingredientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Mostrar los errores de validación -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('colaciones.update', $colacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-4">
                        <h3 class="text-gray-700 font-bold mb-2">Ingredientes</h3>
                        @foreach($ingredientes as $ingrediente)
                            <div class="mb-4">
                                <label for="nombre_ingrediente_{{ $ingrediente->id }}" class="block text-gray-700 font-bold mb-2">Ingrediente:</label>
                                <input type="text" name="ingredientes[{{ $ingrediente->id }}][nombre]" id="nombre_ingrediente_{{ $ingrediente->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('ingredientes.' . $ingrediente->id . '.nombre', $ingrediente->nombre_ingrediente) }}" required>
                                
                                <label for="cantidad_ingrediente_{{ $ingrediente->id }}" class="block text-gray-700 font-bold mt-4 mb-2">Cantidad:</label>
                                <input type="text" name="ingredientes[{{ $ingrediente->id }}][cantidad]" id="cantidad_ingrediente_{{ $ingrediente->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('ingredientes.' . $ingrediente->id . '.cantidad', $ingrediente->cantidad) }}" required>
                            </div>
                        @endforeach
                    </div>
                
                    <button type="submit" class="btn-rubi-verde btn-rubi-verde:hover text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar Ingredientes
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
