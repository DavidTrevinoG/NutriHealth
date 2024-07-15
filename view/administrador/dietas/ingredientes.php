
<div class="container mt-4">
    <h2>Ingredientes de la Colación</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Ingrediente</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($ingredientes as $ingrediente): ?>
                <tr>
                    <td><?php echo $ingrediente['id']; ?></td>
                    <td><?php echo $ingrediente['nombre_ingrediente']; ?></td>
                    <td><?php echo $ingrediente['cantidad']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
