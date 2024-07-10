<?php

class conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $database = "nutrihealth";

    public function conectar()
    {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        } else {
            echo "Conexión exitosa";
        }
        return $conexion;
    }
}
