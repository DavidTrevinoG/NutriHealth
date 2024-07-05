<!-- Registro de usuario -->
<div class="container mt-4">
    <h2>Registro de usuario</h2>

    <form method="post" action="./index.php?m=registroAdministrador">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Password:</label>
            <input type="password" id="contrasena" name="contrasena" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
