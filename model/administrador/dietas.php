<?php
require_once __DIR__ . '/../conexion.php';

class dietas
{
    private $conexion;

    public function __construct() {
        $conexionObj = new conexion();
        $this->conexion = $conexionObj->conectar();
    }
    //función para insertar una colación

    public function insertarColacion($nombre, $imagen, $calorias)
    {
        $stmt = $this->conexion->prepare("INSERT INTO colaciones (nombre_colacion, imagen, calorias) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $imagen, $calorias);
        $stmt->execute();
        return $this->conexion->insert_id;
    }
    //función para insertar una dieta

    public function insertarDieta($colaciones)
    {
        $stmt = $this->conexion->prepare("INSERT INTO dietas (colacion1, colacion2, colacion3, colacion4, colacion5) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiii", ...$colaciones);
        $stmt->execute();
    }
    //función para insertar un ingrediente
    public function insertarIngrediente($nombre, $cantidad, $id_colacion)
    {
        //preparar la consulta
        $stmt = $this->conexion->prepare("INSERT INTO ingredientes (nombre_ingrediente, cantidad, id_colacion) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $cantidad, $id_colacion);
        $stmt->execute();
    }
    //función para obtener las dietas
    public function obtenerDietas()
    {
        $query = "SELECT * FROM dietas";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
  
    //función para obtener las colaciones
    public function obtenerColaciones()
    {
        $query = "SELECT * FROM colaciones";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    //función para obtener los ingredientes
    public function obtenerIngredientes()
    {
        //obtener todos los ingredientes
        $query = "SELECT * FROM ingredientes";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    //función para obtener las colaciones de una dieta
    public function obtenerColacionesDieta($id_dieta) {
        //las colaciones específicas de una dieta por su ID
        $stmt = $this->conexion->prepare("
            SELECT c.id, c.nombre_colacion, c.imagen, c.calorias
            FROM colaciones c
            JOIN dietas d ON c.id IN (d.colacion1, d.colacion2, d.colacion3, d.colacion4, d.colacion5)
            WHERE d.id_dieta = ?
        ");
        //pasar el ID de la dieta a la consulta
        $stmt->bind_param("i", $id_dieta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    //función para obtener los ingredientes de una colación
    public function obtenerIngredientesColacion($id_colacion) {
        //los ingredientes específicos de una colación por su ID
        $stmt = $this->conexion->prepare("SELECT * FROM ingredientes WHERE id_colacion = ?");
        $stmt->bind_param("i", $id_colacion);
        //ejecutar la consulta
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    
}
