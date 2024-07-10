<?php
require_once __DIR__ . '../model/conexion.php';

class dietas
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertarColacion($nombre, $imagen, $calorias)
    {
        $stmt = $this->conn->prepare("INSERT INTO colaciones (nombre_colacion, imagen, calorias) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $imagen, $calorias);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function insertarDieta($colaciones)
    {
        $stmt = $this->conn->prepare("INSERT INTO dietas (colacion1, colacion2, colacion3, colacion4, colacion5) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiii", ...$colaciones);
        $stmt->execute();
    }

    public function insertarIngrediente($nombre, $cantidad, $id_colacion)
    {
        $stmt = $this->conn->prepare("INSERT INTO ingredientes (nombre_ingrediente, cantidad, id_colacion) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $cantidad, $id_colacion);
        $stmt->execute();
    }

    public function obtenerDietas()
    {
        $query = "SELECT * FROM dietas";
        $resultado = $this->conn->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerColaciones()
    {
        $query = "SELECT * FROM colaciones";
        $resultado = $this->conn->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerIngredientes()
    {
        $query = "SELECT * FROM ingredientes";
        $resultado = $this->conn->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
