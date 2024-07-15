<?php

require_once __DIR__ . '/../conexion.php';

class ejercicio{
    private $conexion;

    public function __construct(){
        $this->conexion = new conexion();
    }



    //Obtener ejercicios
    public function obtenerEjercicios(){
        $query = "SELECT e.*, te.nombre_tipo AS tipo_nombre 
                  FROM ejercicios e
                  JOIN tipo_ejercicio te ON e.id_tipo = te.id_tipo";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }


    //Obtener tipos de ejercicio
    public function obtenerTipos(){
        $query = "SELECT * FROM tipo_ejercicio";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }


    //Insertar ejercicio
    public function insertarEjercicios($nombre_ejercicio, $duracion, $descripcion, $id_tipo){
        $query = "INSERT INTO ejercicios(nombre_ejercicio, duracion, descripcion, id_tipo) VALUES  ('$nombre_ejercicio', '$duracion', '$descripcion', '$id_tipo')";
                 $resultado = $this->conexion->conectar()->query($query);

                 return $this->conexion->conectar()->query($query);

    }

    //Buscar ejercicio
    public function obtenerEjercicioPorId($id){
        $query = "SELECT * FROM ejercicios WHERE id = $id";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }

    //Modificar ejercicio
    public function actualizarEjercicio($id, $nombre_ejercicio, $duracion, $descripcion, $id_tipo){
        $query = "UPDATE ejercicios SET nombre_ejercicio = '$nombre_ejercicio', duracion = '$duracion', descripcion = '$descripcion', id_tipo = '$id_tipo' WHERE id = $id";
        return $this->conexion->conectar()->query($query);
    }


    //Eliminar ejercicio
    public function eliminarEjercicio($id){
        $query = "DELETE FROM ejercicios WHERE id = $id";
        return $this->conexion->conectar()->query($query);
    }


}