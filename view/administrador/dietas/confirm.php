<!--Vista que muestra el formulario de confirmación para eliminar un registro de la tabla administrador-->
<section class="container">
    <div class="row">
    <form method="post" action="index.php?m=confirmarDelete&id=<?php echo "0";?>">
        <div class="col-md-6 col-md-offset-3">
            <label>¿Deseas eliminar este registro?</label>
            <input type="hidden" name="txt_id" value="<?php echo $data['id_administrador']; ?>">
            <input type="submit" name="" value="eliminar" class="form-control btn btn-danger">
        </div>
    </form>
    </div>
</section>