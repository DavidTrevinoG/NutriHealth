<?php
require_once __DIR__ . '/../conexion.php';

class index
{
    private $conexion;

    public function __construct() {
        $conexionObj = new conexion();
        $this->conexion = $conexionObj->conectar();
    }
}