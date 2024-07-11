<?php
require_once './model/administrador/dietas.php';

class dietas_controller {
    private $dietaModel;

    public function __construct() {
        $this->dietaModel = new dietas();
    }

    public function index() {
        $dietas = $this->dietaModel->obtenerDietas();
        $colaciones = $this->dietaModel->obtenerColaciones();
        $ingredientes = $this->dietaModel->obtenerIngredientes();
        include './view/administrador/dietas/index.php';

    }

    public function vista_alta() {
        include './view/administrador/dietas/alta.php';

    }
    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colaciones = [];
            
            // Procesar las colaciones
            for ($i = 1; $i <= 5; $i++) {
                //procesar colaciones
                $nombre = $_POST["colacion{$i}_nombre"];
                //procesar imagen
                $imagen = $_FILES["colacion{$i}_imagen"]["name"];
                //procesar calorias
                $calorias = $_POST["colacion{$i}_calorias"];
                //mover imagen
                move_uploaded_file($_FILES["colacion{$i}_imagen"]["tmp_name"], "./imagen/dietas/" . $imagen);
                //insertar colación
                $colacionId = $this->dietaModel->insertarColacion($nombre, $imagen, $calorias);
                //agregar colación al array de colaciones
                array_push($colaciones, $colacionId);

                //procesar ingredientes para cada colación
                foreach ($_POST["colacion{$i}_ingrediente"] as $key => $ingrediente) {
                    //procesar cantidad
                    $cantidad = $_POST["colacion{$i}_cantidad"][$key];
                    //insertar ingrediente
                    $this->dietaModel->insertarIngrediente($ingrediente, $cantidad, $colacionId);
                }
            }
            //isertar la dieta con las colaciones
            $this->dietaModel->insertarDieta($colaciones);                
            header("Location: ./index.php?controller=dietas_controller&action=index");
        } else {
            include './view/administrador/dietas/alta.php';
        }
    }
}
?>
