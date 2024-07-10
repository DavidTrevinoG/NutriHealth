<?php
require_once __DIR__ . '../../../php/conexion.php';

class dietas {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertarColacion($nombre, $imagen, $calorias) {
        $stmt = $this->conn->prepare("INSERT INTO colaciones (nombre_colacion, imagen, calorias) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $imagen, $calorias);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function insertarDieta($colaciones) {
        $stmt = $this->conn->prepare("INSERT INTO dietas (colacion1, colacion2, colacion3, colacion4, colacion5) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiii", ...$colaciones);
        $stmt->execute();
    }

    public function insertarIngrediente($nombre, $cantidad, $id_colacion) {
        $stmt = $this->conn->prepare("INSERT INTO ingredientes (nombre_ingrediente, cantidad, id_colacion) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $cantidad, $id_colacion);
        $stmt->execute();
    }
    // Obtenre cliententes
    public function obtenerDietas() {
        $query = "SELECT * FROM clientes";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // insertar nuevo cliente
        public function insertarCliente($nombre, $email, $telefono) {
            $query = "INSERT INTO Dietas (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
            return $this->conexion->conectar()->query($query);
        }

    // busdcar cliente
        public function obtenerClientePorId($id) {
            $query = "SELECT * FROM Dietas WHERE id = $id";
            $resultado = $this->conexion->conectar()->query($query);

            return $resultado->fetch_assoc();
        }

    //modificar cleinte
        public function actualizarCliente($id, $nombre, $email, $telefono) {
            $query = "UPDATE Dietas SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id = $id";
            return $this->conexion->conectar()->query($query);
        }

    // eliminar clioente
        public function eliminarCliente($id) {
            $query = "DELETE FROM Dietas WHERE id = $id";
            return $this->conexion->conectar()->query($query);
        }
    }



?>
