<?php

require_once __DIR__ . '/../conexion.php';

class TipoEjercicio{

    private $conexion;

    public function __construct(){
        $this->conexion = new conexion();
    }

    
    public function obtenerTipos(){
        $query = "SELECT * FROM tipo_ejercicio";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerEjerciciosPorTipo($id_tipo) {
        $query = "SELECT * FROM ejercicios WHERE id_tipo = $id_tipo";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }



    //insertar un tipo de ejercicio
    public function insertarTipo($nombre_tipo){
        $query = "INSERT INTO tipo_ejercicio (nombre_tipo) VALUES ('$nombre_tipo')";
        return $this->conexion->conectar()->query($query);
    }

    //Buscar tipo de ejercicio
    public function obtenerTipoPorId($id_tipo){
        $query = "SELECT * FROM tipo_ejercicio WHERE id_tipo = $id_tipo";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }


    //Editar tipo de ejercicio
    public function actualizarTipo($id_tipo, $nombre_tipo) {
        $query = "UPDATE tipo_ejercicio SET nombre_tipo = '$nombre_tipo' WHERE id_tipo = $id_tipo";
        return $this->conexion->conectar()->query($query);
    }

    // Eliminar genero
    public function eliminarTipo($id_tipo) {
        $query = "DELETE FROM tipo_ejercicio WHERE id_tipo = $id_tipo";
        return $this->conexion->conectar()->query($query);
    }
}