<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Rango de Calorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form id="rango-form" action="{{ route('admin.rangos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="inicio" class="block text-gray-700 font-bold mb-2">Inicio del Rango:</label>
                        <input type="number" name="inicio" id="inicio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="fin" class="block text-gray-700 font-bold mb-2">Fin del Rango:</label>
                        <input type="number" name="fin" id="fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <button type="submit" class="btn-rubi-verde btn-rubi-verde:hover text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('rango-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const inicio = parseInt(document.getElementById('inicio').value);
            const fin = parseInt(document.getElementById('fin').value);

            if (inicio < 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El inicio del rango no puede ser menor a 1.',
                });
                return;
            }

            if (inicio >= fin) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El inicio del rango no puede ser mayor o igual al fin del rango.',
                });
                return;
            }

            if (fin <= inicio) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El fin del rango no puede ser menor o igual al inicio del rango.',
                });
                return;
            }

            this.submit();
        });
    </script>
</x-app-layout>
