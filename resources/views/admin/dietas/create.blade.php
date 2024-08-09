<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alta de dietas') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <form method="post" action="{{ route('admin.dietas.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Colaciones -->
            <div class="form-section">

                @for ($i = 1; $i <= 5; $i++)
                <div class="snack mb-4" data-snack="{{ $i }}">
                    <h2>Colación {{ $i }}</h2>
                    <label for="colacion{{ $i }}_nombre">Nombre de la Colación {{ $i }}:</label>
                    <input type="text" id="colacion{{ $i }}_nombre" name="colacion{{ $i }}_nombre" class="form-control" required>
                    <label for="colacion{{ $i }}_imagen">Imagen de la Colación {{ $i }}:</label>
                    <input type="file" id="colacion{{ $i }}_imagen" name="colacion{{ $i }}_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion{{ $i }}_calorias">Calorías de la Colación {{ $i }}:</label>
                    <input type="number" id="colacion{{ $i }}_calorias" name="colacion{{ $i }}_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion {{ $i }} -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion{{ $i }}_ingrediente1" name="colacion{{ $i }}_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion{{ $i }}_cantidad1" name="colacion{{ $i }}_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="{{ $i }}">Agregar Ingrediente</button>
                </div>
                @endfor

            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-success mt-3">Enviar</button>
        </form>

        <!-- Script para agregar ingredientes dinámicamente -->
        <script>
            document.querySelectorAll('.agregar-ingredientes').forEach(button => {
                button.addEventListener('click', function() {
                    const snackNumber = this.getAttribute('data-snack');
                    const ingredientesDiv = document.querySelector(`.snack[data-snack="${snackNumber}"] .ingredientes`);
                    const newIngredientRow = document.createElement('div');
                    newIngredientRow.classList.add('ingredient-row');
                    newIngredientRow.innerHTML = `
                        <input type="text" name="colacion${snackNumber}_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                        <input type="text" name="colacion${snackNumber}_cantidad[]" placeholder="Cantidad" class="form-control" required>
                    `;
                    ingredientesDiv.appendChild(newIngredientRow);
                });
            });
        </script>
        </div>
    </div>
</x-app-layout>
