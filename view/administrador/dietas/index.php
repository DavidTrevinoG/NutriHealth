<div class="container mt-4" id="secon">
    <h2>Listado de Dietas</h2>
    <a href="./index.php?controller=DietasAdminController&action=alta" class="btn btn-primary mb-3">Agregar Dieta</a>

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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dietas as $dieta): ?>
                <tr>
                    <td><?php echo $dieta['id_dieta']; ?></td>
                    <td><?php echo $dieta['colacion1']; ?></td>
                    <td><?php echo $dieta['colacion2']; ?></td>
                    <td><?php echo $dieta['colacion3']; ?></td>
                    <td><?php echo $dieta['colacion4']; ?></td>
                    <td><?php echo $dieta['colacion5']; ?></td>
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
                    <td><img src="../../../img/dietas/<?php echo $colacion['imagen']; ?>" width="50"></td>
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
