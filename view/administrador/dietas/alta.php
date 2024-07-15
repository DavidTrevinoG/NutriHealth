<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Dietas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .ingredient-row {
            display: flex;
            margin-bottom: 5px;
        }
        .ingredient-row input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4" id="secon">
        <h1 class="mb-4">Formulario de Dietas</h1>

        <form method="post" action="./index.php?controller=dietas_controller&action=alta" enctype="multipart/form-data">

            <!-- Colaciones -->
            <div class="form-section">

                <!-- Colacion 1 -->
                <div class="snack mb-4" data-snack="1">
                <h2>Colacion 1</h2>
                    <label for="colacion1_nombre">Nombre de la Colación 1:</label>
                    <input type="text" id="colacion1_nombre" name="colacion1_nombre" class="form-control" required>
                    <label for="colacion1_imagen">Imagen de la Colación 1:</label>
                    <input type="file" id="colacion1_imagen" name="colacion1_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion1_calorias">Calorías de la Colación 1:</label>
                    <input type="number" id="colacion1_calorias" name="colacion1_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion 1 -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion1_ingrediente1" name="colacion1_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion1_cantidad1" name="colacion1_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="1">Agregar Ingrediente</button>
                </div>

                <!-- Colacion 2 -->
                <h2>Colacion 2</h2>

                <div class="snack mb-4" data-snack="2">
                    <label for="colacion2_nombre">Nombre de la Colación 2:</label>
                    <input type="text" id="colacion2_nombre" name="colacion2_nombre" class="form-control" required>
                    <label for="colacion2_imagen">Imagen de la Colación 2:</label>
                    <input type="file" id="colacion2_imagen" name="colacion2_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion2_calorias">Calorías de la Colación 2:</label>
                    <input type="number" id="colacion2_calorias" name="colacion2_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion 2 -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion2_ingrediente1" name="colacion2_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion2_cantidad1" name="colacion2_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="2">Agregar Ingrediente</button>
                </div>
                <h2>Colacion 3</h2>

                <!-- Colacion 3 -->
                <div class="snack mb-4" data-snack="3">
                    <label for="colacion3_nombre">Nombre de la Colación 3:</label>
                    <input type="text" id="colacion3_nombre" name="colacion3_nombre" class="form-control" required>
                    <label for="colacion3_imagen">Imagen de la Colación 3:</label>
                    <input type="file" id="colacion3_imagen" name="colacion3_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion3_calorias">Calorías de la Colación 3:</label>
                    <input type="number" id="colacion3_calorias" name="colacion3_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion 3 -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion3_ingrediente1" name="colacion3_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion3_cantidad1" name="colacion3_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="3">Agregar Ingrediente</button>
                </div>
                <h2>Colacion 4</h2>

                <!-- Colacion 4 -->
                <div class="snack mb-4" data-snack="4">
                    <label for="colacion4_nombre">Nombre de la Colación 4:</label>
                    <input type="text" id="colacion4_nombre" name="colacion4_nombre" class="form-control" required>
                    <label for="colacion4_imagen">Imagen de la Colación 4:</label>
                    <input type="file" id="colacion4_imagen" name="colacion4_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion4_calorias">Calorías de la Colación 4:</label>
                    <input type="number" id="colacion4_calorias" name="colacion4_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion 4 -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion4_ingrediente1" name="colacion4_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion4_cantidad1" name="colacion4_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="4">Agregar Ingrediente</button>
                </div>
                <h2>Colacion 5</h2>

                <!-- Colacion 5 -->
                <div class="snack mb-4" data-snack="5">
                    <label for="colacion5_nombre">Nombre de la Colación 5:</label>
                    <input type="text" id="colacion5_nombre" name="colacion5_nombre" class="form-control" required>
                    <label for="colacion5_imagen">Imagen de la Colación 5:</label>
                    <input type="file" id="colacion5_imagen" name="colacion5_imagen" accept="image/*" class="form-control-file" required>
                    <label for="colacion5_calorias">Calorías de la Colación 5:</label>
                    <input type="number" id="colacion5_calorias" name="colacion5_calorias" class="form-control" required>

                    <!-- Ingredientes de la Colacion 5 -->
                    <div class="ingredientes mt-3">
                        <div class="ingredient-row">
                            <input type="text" id="colacion5_ingrediente1" name="colacion5_ingrediente[]" placeholder="Ingrediente" class="form-control" required>
                            <input type="text" id="colacion5_cantidad1" name="colacion5_cantidad[]" placeholder="Cantidad" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="agregar-ingredientes btn btn-primary mt-2" data-snack="5">Agregar Ingrediente</button>
                </div>

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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
