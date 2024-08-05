<?php
// models/User.php

require_once 'model/conexion.php';

class User {

    public $id;

    public function login($user, $password) {

        $conexion = new conexion();
        $conn = $conexion->conectar();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?");
        echo "<script>alert('".$user.$password."');</script>";
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si se encontró un usuario
        if ($result->num_rows > 0) {
            // Usuario encontrado, iniciar sesión
            echo "Inicio de sesión exitoso";
            // Aquí puedes iniciar la sesión o redirigir al usuario a otra página
            session_start();
            $_SESSION['username'] = $username;
            // Redirigir a la página de inicio
            header("Location: indexNutriHealth.php");
            exit();
        } 
        
    }
}
?>

