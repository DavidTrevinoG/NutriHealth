<?php

class conexion {
    private $host = "localhost";
    private $user = "admin";
    private $password = "42e8e5be462585ef9f18539f62615e5969be86708373e8c4"; 
    private $database = "nutrihealth";

    public function conectar() {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        else{
            echo "Conexión exitosa";
        }

        return $conexion;
    }
}
?>