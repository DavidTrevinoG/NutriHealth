<?php

class conexion
{
    private $host = "localhost";
    private $user = "administrador";
    private $password = "proyecto1234";
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
