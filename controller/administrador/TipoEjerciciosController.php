<?php

require_once '././././model/administrador/TiposEjercicio.php';


class TipoEjerciciosController{

    private $tiposejercicioModel;


    public function __construct(){
        $this->tiposejercicioModel = new TipoEjercicio();

    }


    //Listado de tipos de ejercicios
    public function index(){
        $tiposejercicios = $this->tiposejercicioModel->obtenerTipos();
        include './view/administrador/tipo_ejercicios/index.php';
    }


    //Dar de alta un tipo de ejercicio
    public function alta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_tipo = $_POST['nombre_tipo'];
            $this->tiposejercicioModel->insertarTipo($nombre_tipo);
            header("Location: ./index.php?controller=TipoEjerciciosController&action=index");
        } else {
            include './view/administrador/tipo_ejercicios/alta.php';
        }
    }

    // Editar tipo de ejercicio
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tipo = $_POST['id_tipo'];
            $nombre_tipo = $_POST['nombre_tipo'];
            $this->tiposejercicioModel->actualizarTipo($id_tipo, $nombre_tipo);
            header("Location: ./index.php?controller=TipoEjerciciosController&action=index");
        } else {
            $id_tipo = $_GET['id_tipo'];
            $tipoejercicio = $this->tiposejercicioModel->obtenerTipoPorId($id_tipo);
            if ($tipoejercicio) {
                include './view/administrador/tipo_ejercicios/editar.php';
            } else {
                echo "No se encontró el tipo de ejercicio con id $id_tipo.";
            }
        }
    }

    public function eliminar() {
        $id_tipo = $_GET['id_tipo'];

        // Verificar si hay ejercicios asociados a este tipo de ejercicio
        $ejerciciosAsociados = $this->tiposejercicioModel->obtenerEjerciciosPorTipo($id_tipo);

        if (!empty($ejerciciosAsociados)) {
            // Mostrar un mensaje de error o redirigir con un mensaje de error
            echo "No se puede eliminar este tipo de ejercicio porque tiene ejercicios asociados.";
            // Puedes redirigir a la página anterior o mostrar un mensaje de error
            exit;
        }

        // Si no hay ejercicios asociados, procede con la eliminación del tipo de ejercicio
        $this->tiposejercicioModel->eliminarTipo($id_tipo);
        header("Location: ./index.php?controller=TipoEjerciciosController&action=index");
    }


}