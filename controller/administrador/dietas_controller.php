<?php
require_once '../../model/administrador/dietas.php';
require_once __DIR__ . '../../php/conexion.php';

class dietas_controller {
    private $dietaModel;

    public function __construct() {
        global $conexion;
        $this->dietaModel = new dietas($conexion);
    }

    public function index() {
        $dietas = $this->dietaModel->obtenerDietas();
        $colaciones = $this->dietaModel->obtenerColaciones();
        $ingredientes = $this->dietaModel->obtenerIngredientes();
        include '../../view/administrador/dietas/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colaciones = [];
            
            // Procesar las colaciones
            for ($i = 1; $i <= 5; $i++) {
                $nombre = $_POST["colacion{$i}_nombre"];
                $imagen = $_FILES["colacion{$i}_imagen"]["name"];
                $calorias = $_POST["colacion{$i}_calorias"];
                move_uploaded_file($_FILES["colacion{$i}_imagen"]["tmp_name"], "../../../img/dietas/" . $imagen);
                $colacionId = $this->dietaModel->insertarColacion($nombre, $imagen, $calorias);
                array_push($colaciones, $colacionId);

                // Procesar ingredientes para cada colación
                foreach ($_POST["colacion{$i}_ingrediente"] as $key => $ingrediente) {
                    $cantidad = $_POST["colacion{$i}_cantidad"][$key];
                    $this->dietaModel->insertarIngrediente($ingrediente, $cantidad, $colacionId);
                }
            }
            // Insertar la dieta con las colaciones
            $this->dietaModel->insertarDieta($colaciones);                
            header("Location: ./index.php?controller=DietasAdminController&action=index");
        } else {
            include './view/administrador/dietas/alta.php';
        }
    }
}
?>
