<?php
$host = 'localhost';
$dbname = 'nutrihealth';
$username = 'root';
$password = 'root';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} else {
    echo "jaló";
}
