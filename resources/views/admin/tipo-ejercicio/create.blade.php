<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Tipo de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="px-4 py-2 flex justify-between items-center bg-gray-100 border-b border-gray-200">
                    <h5 class="font-bold text-gray-900 text-lg">Crear Tipo de Ejercicio</h5>
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

                    <form action="{{ route('admin.tipo-ejercicio.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre_tipo" class="block text-gray-700 font-semibold mb-2">Nombre del Tipo de Ejercicio</label>
                            <input type="text" name="nombre_tipo" id="nombre_tipo" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('nombre_tipo') }}" required>
                        </div>
                    
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.tipo-ejercicio.index') }}" class="btn btn-danger text-white text-sm font-medium rounded transition duration-150 my-2">Cancelar</a>
                            <button type="submit" class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">Crear</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
