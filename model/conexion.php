<?php

class conexion
{
    private $host = "localhost";
    private $user = "Dafne";
    private $password = "1234";
    private $database = "nutriHealth";

    public function conectar()
    {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die(": " . $conexion->connect_error);
        } else {
            echo "SI JALA";
        }
        return $conexion;
    }
}
