<div class="container mt-4" id="secon">

    <h1>Formulario de Dietas</h1>

    <form method="post" action="./index.php?controller=dietas_controller&action=alta" enctype="multipart/form-data">
        

        <!--Colaciones-->
        <div class="form-section">
            <h2>Colaciones</h2>
            <!--Colacion 1-->
            <div class="snack" data-snack="1">
                <label for="colacion1_nombre">Nombre de la Colación 1:</label>
                <input type="text" id="colacion1_nombre" name="colacion1_nombre" required>
                <br>
                <label for="colacion1_imagen">Imagen de la Colación 1:</label>
                <input type="file" id="colacion1_imagen" name="colacion1_imagen" accept="image/*" required>
                <br><label for="colacion1_calorias">Calorías de la Colación 1:</label>
                <input type="number" id="colacion1_calorias" name="colacion1_calorias" required>
                
                <!--Ingredientes de la Colacion 1-->
                <div class="ingredientes">
                    <div class="ingredient-row">
                        <input type="text" id="colacion1_ingrediente1" name="colacion1_ingrediente[]" placeholder="Ingrediente" required>
                        <input type="text" id="colacion1_cantidad1" name="colacion1_cantidad[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" class="agregar-ingredientes" data-snack="1">Agregar Ingrediente</button>
            </div>
            <br>
            <!--Colacion 2-->
            <div class="snack" data-snack="2">
                <label for="colacion2_nombre">Nombre de la Colación 2:</label>
                <input type="text" id="colacion2_nombre" name="colacion2_nombre" required>
                <br><label for="colacion2_imagen">Imagen de la Colación 2:</label>
                <input type="file" id="colacion2_imagen" name="colacion2_imagen" accept="image/*" required>
                <br><label for="colacion2_calorias">Calorías de la Colación 2:</label>
                <input type="number" id="colacion2_calorias" name="colacion2_calorias" required>
                
                <!--Ingredientes de la Colacion 2-->
                <div class="ingredientes">
                    <div class="ingredient-row">
                        <input type="text" id="colacion2_ingrediente1" name="colacion2_ingrediente[]" placeholder="Ingrediente" required>
                        <input type="text" id="colacion2_cantidad1" name="colacion2_cantidad[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" class="agregar-ingredientes" data-snack="2">Agregar Ingrediente</button>
            </div>
            <br>
            <!--Colacion 3-->
            <div class="snack" data-snack="3">
                <label for="colacion3_nombre">Nombre de la Colación 3:</label>
                <input type="text" id="colacion3_nombre" name="colacion3_nombre" required>
                <br><label for="colacion3_imagen">Imagen de la Colación 3:</label>
                <input type="file" id="colacion3_imagen" name="colacion3_imagen" accept="image/*" required>
                <br><label for="colacion3_calorias">Calorías de la Colación 3:</label>
                <input type="number" id="colacion3_calorias" name="colacion3_calorias" required>
                
                <!--Ingredientes de la Colacion 3-->
                <div class="ingredientes">
                    <div class="ingredient-row">
                        <input type="text" id="colacion3_ingrediente1" name="colacion3_ingrediente[]" placeholder="Ingrediente" required>
                        <input type="text" id="colacion3_cantidad1" name="colacion3_cantidad[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" class="agregar-ingredientes" data-snack="3">Agregar Ingrediente</button>
            </div>
            <br>
            <!--Colacion 4-->
            <div class="snack" data-snack="4">
                <label for="colacion4_nombre">Nombre de la Colación 4:</label>
                <input type="text" id="colacion4_nombre" name="colacion4_nombre" required>
                <br><label for="colacion4_imagen">Imagen de la Colación 4:</label>
                <input type="file" id="colacion4_imagen" name="colacion4_imagen" accept="image/*" required>
                <br><label for="colacion4_calorias">Calorías de la Colación 4:</label>
                <input type="number" id="colacion4_calorias" name="colacion4_calorias" required>
                
                <!--Ingredientes de la Colacion 4-->
                <div class="ingredientes">
                    <div class="ingredient-row">
                        <input type="text" id="colacion4_ingrediente1" name="colacion4_ingrediente[]" placeholder="Ingrediente" required>
                        <input type="text" id="colacion4_cantidad1" name="colacion4_cantidad[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" class="agregar-ingredientes" data-snack="4">Agregar Ingrediente</button>
            </div>
            <br>
            <!--Colacion 5-->
            <div class="snack" data-snack="5">
                <label for="colacion5_nombre">Nombre de la Colación 5:</label>
                <input type="text" id="colacion5_nombre" name="colacion5_nombre" required>
                <br><label for="colacion5_imagen">Imagen de la Colación 5:</label>
                <input type="file" id="colacion5_imagen" name="colacion5_imagen" accept="image/*" required>
                <br><label for="colacion5_calorias">Calorías de la Colación 5:</label>
                <input type="number" id="colacion5_calorias" name="colacion5_calorias" required>
                
                <!--Ingredientes de la Colacion 5-->
                <div class="ingredientes">
                    <div class="ingredient-row">
                        <input type="text" id="colacion5_ingrediente1" name="colacion5_ingrediente[]" placeholder="Ingrediente" required>
                        <input type="text" id="colacion5_cantidad1" name="colacion5_cantidad[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" class="agregar-ingredientes" data-snack="5">Agregar Ingrediente</button>
            </div>
        </div>
        <br>
        <!--Botón de enviar-->
        <button type="submit">Enviar</button>
    </form>

    <script>
        //Script para agregar ingredientes dinámicamente
        document.querySelectorAll('.agregar-ingredientes').forEach(button => {
        //Agregar un evento de click a cada botón de agregar ingredientes
            button.addEventListener('click', function() {
                //Obtener el mro de la colación a la que pertenece el botón
                const snackNumber = this.getAttribute('data-snack');
                //Obtener el div de ingredientes de la colación
                const ingredientesDiv = document.querySelector(`.snack[data-snack="${snackNumber}"] .ingredientes`);
                //Crear un nuevo renglón de ingredientes
                const newIngredientRow = document.createElement('div');
                //Agregar la clase ingredient-row al nuevo renglón
                newIngredientRow.classList.add('ingredient-row');
                //Agregar los inputs de ingrediente y cantidad al nuevo renglón
                newIngredientRow.innerHTML = `
                    <input type="text" name="colacion${snackNumber}_ingrediente[]" placeholder="Ingrediente" required>
                    <input type="text" name="colacion${snackNumber}_cantidad[]" placeholder="Cantidad" required>
                `;
                
                ingredientesDiv.appendChild(newIngredientRow);
            });
        });
    </script>

</div>