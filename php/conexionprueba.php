<?php
$host = 'localhost';
$dbname = 'nutrihealth';
$username = 'admin';
$password = '42e8e5be462585ef9f18539f62615e5969be86708373e8c4';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} else {
    echo "jaló";
}

?>