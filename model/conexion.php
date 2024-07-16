<?php

class conexion
{
    private $host = "localhost";
    private $user = "admin";
    private $password = "667163f3391b041101167c5b4e8f9ba43748e1bb6f5c03f0";
    private $database = "nutriHealth";

    public function conectar()
    {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die(": " . $conexion->connect_error);
        } else {
            echo "";
        }
        return $conexion;
    }
}
