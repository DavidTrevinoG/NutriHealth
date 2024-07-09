<div class="container mt-4" id="secon">
    <h2>Listado de tipos de ejercicios</h2>

    <a href="./index.php?controller=TipoEjerciciosController&action=alta" class="btn btn-primary mb-3">Agregar un nuevo tipo de ejercicio</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de ejercicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tiposejercicios as $tipoejercicio):?>
            <tr>
                <td><?php echo $tipoejercicio['id_tipo'];?></td>
                <td><?php echo $tipoejercicio['nombre_tipo'];?></td>
                <td>
                    <a href="./index.php?controller=TipoEjerciciosController&action=editar&id_tipo=<?php echo $tipoejercicio['id_tipo']; ?>" class="btn btn-warning">Editar</a>
                    <a href="./index.php?controller=TipoEjerciciosController&action=eliminar&id_tipo=<?php echo $tipoejercicio['id_tipo']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>