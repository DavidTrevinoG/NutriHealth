<div class="container mt-4" id="secon">
    <h2>Alta de ejercicio</h2>

    <form method="post" action="./index.php?controller=ejercicios_controller&action=alta">
        <div class="form-group">
            <label for="nombre_ejercicio">Nombre del ejercicio</label>
            <input type="text" name="nombre_ejercicio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="text" name="duracion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_tipo">Tipo de ejercicio</label>
            <select name="id_tipo" class="form-control" required>
                <?php foreach($tiposejercicio as $tipo): ?>
                <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['nombre_tipo']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
