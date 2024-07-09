<?php
require_once '../../../model/administrador/dietas.php';

class diestas_admin_controller {
    private $model;

    public function __construct($conn) {
        $this->model = new DietaModel($conn);
    }

    public function procesarFormulario() {
        $colaciones = [];
        
        // Procesar las colaciones
        for ($i = 1; $i <= 5; $i++) {
            $nombre = $_POST["colacion{$i}_nombre"];
            $imagen = $_FILES["colacion{$i}_imagen"]["name"];
            $calorias = $_POST["colacion{$i}_calorias"];
            move_uploaded_file($_FILES["colacion{$i}_imagen"]["tmp_name"], "../../../img/dietas/" . $imagen);
            $colacionId = $this->model->insertarColacion($nombre, $imagen, $calorias);
            array_push($colaciones, $colacionId);

            // Procesar ingredientes para cada colación
            foreach ($_POST["colacion{$i}_ingrediente"] as $key => $ingrediente) {
                $cantidad = $_POST["colacion{$i}_cantidad"][$key];
                $this->model->insertarIngrediente($ingrediente, $cantidad, $colacionId);
            }
        }

        // Insertar la dieta con las colaciones
        $this->model->insertarDieta($colaciones);
    }
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new DietasAdminController($conn);
    $controller->procesarFormulario();
    echo "Dieta guardada con éxito!";
}
?>
