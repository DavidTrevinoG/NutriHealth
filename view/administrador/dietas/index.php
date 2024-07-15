<div class="container mt-4" id="secon">
    <h2>Listado de Dietas</h2>
    <a href="./index.php?controller=dietas_controller&action=vista_alta" class="btn btn-primary mb-3">Agregar Dieta</a>

    <h3>Dietas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Colación 1</th>
                <th>Colación 2</th>
                <th>Colación 3</th>
                <th>Colación 4</th>
                <th>Colación 5</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dietas as $dieta): ?>
                <tr>
                    <td><?php echo $dieta['id_dieta']; ?>
                    
                    </td>
                    <td><?php echo $dieta['colacion1']; ?><br>
                </td>
                    <td><?php echo $dieta['colacion2']; ?></td>
                    <td><?php echo $dieta['colacion3']; ?></td>
                    <td><?php echo $dieta['colacion4']; ?></td>
                    <td><?php echo $dieta['colacion5']; ?></td>
                    <td>
                    <a href="./index.php?controller=dietas_controller&action=colaciones&id=<?php echo $dieta['id_dieta']; ?>" class="btn btn-info">Colaciones</a>
                    <a href="./index.php?controller=dietas_controller&action=editar&id=<?php echo $dieta['id_dieta']; ?>" class="btn btn-warning">Editar</a>
                    <a href="./index.php?controller=dietas_controller&action=eliminar&id=<?php echo $dieta['id_dieta']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Colaciones</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Calorías</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colaciones as $colacion): ?>
                <tr>
                    <td><?php echo $colacion['id']; ?></td>
                    <td><?php echo $colacion['nombre_colacion']; ?></td>
                    <td><img src="./imagen/dietas/<?php echo $colacion['imagen']; ?>" width="50"></td>
                    <td><?php echo $colacion['calorias']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Ingredientes</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>ID Colación</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientes as $ingrediente): ?>
                <tr>
                    <td><?php echo $ingrediente['id']; ?></td>
                    <td><?php echo $ingrediente['nombre_ingrediente']; ?></td>
                    <td><?php echo $ingrediente['cantidad']; ?></td>
                    <td><?php echo $ingrediente['id_colacion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
