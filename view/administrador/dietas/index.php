<div class="container mt-4" id="secon">
    <h2>Listado de Clientes</h2>

    <a href="./index.php?controller=ClientesController&action=alta" class="btn btn-primary mb-3">Agregar Cliente</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nombre']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td><?php echo $cliente['telefono']; ?></td>
                <td>
                    <a href="./index.php?controller=ClientesController&action=editar&id=<?php echo $cliente['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="./index.php?controller=ClientesController&action=eliminar&id=<?php echo $cliente['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>