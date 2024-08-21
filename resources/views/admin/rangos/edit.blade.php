<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rango de Calorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.rangos.update', $rango->id) }}" method="POST" id="rangoForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="inicio" class="block text-gray-700 font-bold mb-2">Inicio del Rango:</label>
                        <input type="number" name="inicio" id="inicio" value="{{ old('inicio', $rango->inicio) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="fin" class="block text-gray-700 font-bold mb-2">Fin del Rango:</label>
                        <input type="number" name="fin" id="fin" value="{{ old('fin', $rango->fin) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <button type="submit" class="btn-rubi-verde btn-rubi-verde:hover text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
