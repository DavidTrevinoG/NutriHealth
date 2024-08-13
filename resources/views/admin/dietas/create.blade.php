<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alta de dietas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('admin.dietas.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Colaciones -->
                    <div class="form-section space-y-6">
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="snack p-4 border border-gray-300 rounded-lg shadow-sm" data-snack="{{ $i }}">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Colación {{ $i }}</h3>
                            <div class="mb-4">
                                <label for="colacion{{ $i }}_nombre" class="block text-sm font-medium text-gray-600">Nombre de la Colación {{ $i }}:</label>
                                <input type="text" id="colacion{{ $i }}_nombre" name="colacion{{ $i }}_nombre" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            </div>
                            <div class="mb-4">
                                <label for="colacion{{ $i }}_imagen" class="block text-sm font-medium text-gray-600">Imagen de la Colación {{ $i }}:</label>
                                <input type="file" id="colacion{{ $i }}_imagen" name="colacion{{ $i }}_imagen" accept="image/*" class="form-control-file mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            </div>
                            <div class="mb-4">
                                <label for="colacion{{ $i }}_calorias" class="block text-sm font-medium text-gray-600">Calorías de la Colación {{ $i }}:</label>
                                <input type="number" id="colacion{{ $i }}_calorias" name="colacion{{ $i }}_calorias" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            </div>

                            <!-- Ingredientes de la Colacion {{ $i }} -->
                            <div class="ingredientes mt-4">
                                <div class="ingredient-row mb-3 flex gap-2">
                                    <input type="text" id="colacion{{ $i }}_ingrediente1" name="colacion{{ $i }}_ingrediente[]" placeholder="Ingrediente" class="form-control flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                                    <input type="text" id="colacion{{ $i }}_cantidad1" name="colacion{{ $i }}_cantidad[]" placeholder="Cantidad" class="form-control flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                                    <button type="button" class="remove-ingredient btn btn-danger text-white" aria-label="Eliminar ingrediente">Eliminar</button>
                                </div>
                            </div>
                            <button type="button" class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2 agregar-ingredientes" data-snack="{{ $i }}">Agregar Ingrediente</button>
                        </div>
                        @endfor
                    </div>

                    <!-- Botón de enviar -->
                    <button type="submit" class="btn btn-success mt-4">Enviar</button>
                </form>

            <script>
                document.querySelectorAll('.agregar-ingredientes').forEach(button => {
                    button.addEventListener('click', function() {
                        const snackNumber = this.getAttribute('data-snack');
                        const ingredientesDiv = document.querySelector(`.snack[data-snack="${snackNumber}"] .ingredientes`);
                        const ingredientRows = ingredientesDiv.querySelectorAll('.ingredient-row').length;

                        if (ingredientRows >= 5) { // Limitar el número de ingredientes a 5 por colación
                            Swal.fire({
                                icon: 'warning',
                                title: 'Máximo alcanzado',
                                text: 'Puedes agregar hasta 5 ingredientes como máximo.',
                                confirmButtonText: 'Aceptar'
                            });
                            return;
                        }

                        const newIngredientRow = document.createElement('div');
                        newIngredientRow.classList.add('ingredient-row', 'mb-3', 'flex', 'gap-2');
                        newIngredientRow.innerHTML = `
                            <input type="text" name="colacion${snackNumber}_ingrediente[]" placeholder="Ingrediente" class="form-control flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            <input type="text" name="colacion${snackNumber}_cantidad[]" placeholder="Cantidad" class="form-control flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                            <button type="button" class="remove-ingredient btn btn-danger text-white" aria-label="Eliminar ingrediente">Eliminar</button>
                        `;
                        ingredientesDiv.appendChild(newIngredientRow);

                        // Attach the remove ingredient event
                        attachRemoveEvent();
                    });
                });

                function attachRemoveEvent() {
                    document.querySelectorAll('.remove-ingredient').forEach(button => {
                        button.addEventListener('click', function() {
                            const ingredientRow = this.parentElement;
                            const ingredientesDiv = ingredientRow.parentElement;
                            if (ingredientesDiv.querySelectorAll('.ingredient-row').length > 1) {
                                ingredientRow.remove();
                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ingredientes insuficientes',
                                    text: 'Debe haber al menos un ingrediente.',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        });
                    });
                }

                // Attach remove event to existing buttons
                attachRemoveEvent();
            </script>

            </div>
        </div>
    </div>
</x-app-layout>
