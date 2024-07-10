<div class="container mt-4" id="secon">
    <h2>Alta de tipo dejercicio</h2>

    <form method="post" action="./index.php?controller=TipoEjerciciosController&action=alta">
        <div class="form-group">
            <label for="nombre_tipo">Tipo de ejercicio</label>
            <input type="text" name="nombre_tipo" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div> 