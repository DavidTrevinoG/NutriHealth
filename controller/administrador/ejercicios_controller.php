<?php

require_once '././././model/administrador/ejercicios.php';

class ejercicios_controller {

    private $ejerciciosModel,$tiposejercicio;

    public function __construct(){
        $this->ejerciciosModel = new ejercicio();
    }

    // Listado de ejercicios
    public function index(){
        $ejercicios = $this->ejerciciosModel->obtenerEjercicios();
        $tiposejercicio = $this->ejerciciosModel->obtenerTipos();
        include './view/administrador/ejercicios/index.php';
    }

    // Dar de alta un ejercicio
    public function alta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_ejercicio = $_POST['nombre_ejercicio'];
            $duracion = $_POST['duracion'];
            $descripcion = $_POST['descripcion'];
            $tipo_id = $_POST['id_tipo'];
            $this->ejerciciosModel->insertarEjercicios($nombre_ejercicio, $duracion, $descripcion, $id_tipo);
            header("Location: ./index.php?controller=ejercicios_controller&action=index");
        } else {
            $tiposejercicio = $this->ejerciciosModel->obtenerTipos();
            include './view/administrador/ejercicios/alta.php';
        }
    }

    // Editar el ejercicio
    public function editar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre_ejercicio = $_POST['nombre_ejercicio'];
            $duracion = $_POST['duracion'];
            $descripcion = $_POST['descripcion'];
            $id_tipo = $_POST['id_tipo'];
            $this->ejerciciosModel->actualizarEjercicio($id, $nombre_ejercicio, $duracion, $descripcion, $id_tipo);
            header("Location: ./index.php?controller=ejercicios_controller&action=index");
            exit();
        } else {
            $id = $_GET['id'];
            $ejercicio = $this->ejerciciosModel->obtenerEjercicioPorId($id);
            $tiposejercicio = $this->ejerciciosModel->obtenerTipos();
            include './view/administrador/ejercicios/editar.php';
        }
    }

    // Eliminar ejercicio
    public function eliminar(){
        $id = $_GET['id'];
        $this->ejerciciosModel->eliminarEjercicio($id);
        header("Location: ./index.php?controller=ejercicios_controller&action=index");
    }
}
