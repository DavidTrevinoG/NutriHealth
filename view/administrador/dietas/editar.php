<div class="container mt-4" id="secon">
    <h2>Editar Cliente</h2>

    <form method="post" action="./index.php?controller=ClientesController&action=editar">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $cliente['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="form-control" value="<?php echo $cliente['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" class="form-control" value="<?php echo $cliente['telefono']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>