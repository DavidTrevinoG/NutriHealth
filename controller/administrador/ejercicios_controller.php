<?php

require_once '././././model/administrador/ejercicios.php';

class ejercicios_controller {

    private $ejerciciosModel;

    public function __construct(){
        $this->ejerciciosModel = new ejercicio();
    }

    // Listado de ejercicios
    public function index(){
        $ejercicios = $this->ejerciciosModel->obtenerEjercicios();
        $tiposejercicio = $this->ejerciciosModel->obtenerTipos();
        include './view/administrador/ejercicios/index.php';
    }

    public function alta(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_ejercicio = $_POST['nombre_ejercicio'];
            $duracion = $_POST['duracion'];
            $descripcion = $_POST['descripcion'];
            $id_tipo = $_POST['id_tipo'];
    
            // Manejar la carga de la imagen
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = basename($_FILES['image']['name']);
                $rutaDestino = './imagen/ejercicios/' . $nombreArchivo;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $rutaDestino)) {
                    $image = $rutaDestino;
                }
            }
    
            $this->ejerciciosModel->insertarEjercicios($nombre_ejercicio, $duracion, $descripcion, $id_tipo, $image);
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
    
            // Manejar la carga de la imagen
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = basename($_FILES['image']['name']);
                $rutaDestino = './imagen/ejercicios/' . $nombreArchivo;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $rutaDestino)) {
                    $image = $rutaDestino;
                }
            }
    
            // Obtener la imagen actual si no se subió una nueva
            if (!$image) {
                $ejercicio = $this->ejerciciosModel->obtenerEjercicioPorId($id);
                $image = $ejercicio['image'];
            }
    
            $this->ejerciciosModel->actualizarEjercicio($id, $nombre_ejercicio, $duracion, $descripcion, $id_tipo, $image);
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
