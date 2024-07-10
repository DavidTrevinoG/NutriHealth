<div class="container mt-4" id="secon">
    <h2>Listado de ejercicios</h2>

    <a href="./index.php?controller=ejercicios_controller&action=alta" class="btn btn-primary mb-3">Agregar un nuevo ejercicio</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del ejercicio</th>
                <th>Duración</th>
                <th>Descripción</th>
                <th>Tipo de ejercicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ejercicios as $ejercicio): ?>
            <tr>
                <td><?php echo $ejercicio['id']; ?></td>
                <td><?php echo $ejercicio['nombre_ejercicio']; ?></td>
                <td><?php echo $ejercicio['duracion']; ?></td>
                <td><?php echo $ejercicio['descripcion']; ?></td>
                <td><?php echo $ejercicio['tipo_nombre']; ?></td>
                <td>
                    <a href="./index.php?controller=ejercicios_controller&action=editar&id=<?php echo $ejercicio['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="./index.php?controller=ejercicios_controller&action=eliminar&id=<?php echo $ejercicio['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
