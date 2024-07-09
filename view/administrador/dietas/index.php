<!-- Vista de la tabla de administradores -->
<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Administradores Registrados</h2>
        
    </div>
    <div class="container">

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id_administrador']; ?></th>
                        <th><?php echo $data['usuario']; ?></th>
                        <th><?php echo $data['contrasena']; ?></th>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>