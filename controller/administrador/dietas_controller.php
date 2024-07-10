<?php
require_once '../../../model/administrador/dietas.php';

class diestas_admin_controller {
    private $dietaModel;

    public function __construct() {
        $this->dietaModel = new dietas();
    }
    public function index() {
        $dietas = $this->dietaModel->obtenerDietas();
        include './view/administrador/dietas/index.php';
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
                    $colacionId = $this->model->insertarColacion($nombre, $imagen, $calorias);
                    array_push($colaciones, $colacionId);

                    // Procesar ingredientes para cada colación
                    foreach ($_POST["colacion{$i}_ingrediente"] as $key => $ingrediente) {
                        $cantidad = $_POST["colacion{$i}_cantidad"][$key];
                        $this->dietaModel->insertarIngrediente($ingrediente, $cantidad, $colacionId);
                    }
                }
                // Insertar la dieta con las colaciones
                $this->model->insertarDieta($colaciones);                
                header("Location: ./index.php?controller=dietas_controller&action=index");
            } else {
                    include './view/administrador/dietas/alta.php';
            }
        }

        public function editar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                $this->dietaModel->actualizarCliente($id, $nombre, $correo, $telefono);
                header("Location: ./index.php?controller=ClientesController&action=index");
            } else {
                $id = $_GET['id'];
                $cliente = $this->dietaModel->obtenerClientePorId($id);
                include './views/clientes/editar.php';
            }
        }

    }
?>
