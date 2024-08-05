<?php
// controllers/AuthController.php

require_once 'model/usuario/user.php';

class AuthController {

    public function login() {
        if (isset($_POST['userlogin'])) {

            $database = new conexion();
            $db = $database->conectar();
            
            $user = new User();

            if ($user->login($_POST['username'], $_POST['password'])) {
                session_start();
                $_SESSION['user_id'] = $user->id;
            } else {
                echo "Invalid username or password.";
            }
        }
    }

    public function dashboard(){
        include "view/usuario/dashboard.php";
    }

    public function cerrarSesion(){
        session_start();
        session_destroy();
        header("Location: view/usuario/login.php");
    }
}
?>
