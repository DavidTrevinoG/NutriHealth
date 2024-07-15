<div class="container mt-4">
    <h2>Colaciones de la Dieta</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Calorías</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colaciones_dieta as $colacion): ?>
                <tr>
                    <td><?php echo $colacion['id']; ?></td>
                    <td><?php echo $colacion['nombre_colacion']; ?></td>
                    <td><img src="./imagen/dietas/<?php echo $colacion['imagen']; ?>" width="50"></td>
                    <td><?php echo $colacion['calorias']; ?></td>
                    <td>
                        <a href="./index.php?controller=dietas_controller&action=ingredientes&id=<?php echo $colacion['id']; ?>" class="btn btn-info">Ingredientes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
