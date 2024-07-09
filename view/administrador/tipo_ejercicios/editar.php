<div class="container mt-4" id="secon">
    <h2>Editar Tipo de Ejercicio</h2>

    <form method="post" action="./index.php?controller=TipoEjerciciosController&action=editar">
        <input type="hidden" name="id_tipo" value="<?php echo $tipoejercicio['id_tipo']; ?>">
        <div class="form-group">
            <label for="nombre_tipo">Tipo de ejercicio:</label>
            <input type="text" name="nombre_tipo" class="form-control" value="<?php echo $tipoejercicio['nombre_tipo']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>