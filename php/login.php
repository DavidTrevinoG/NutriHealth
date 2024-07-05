<?php 

include_once 'conexion.php';

if(isset($_POST['login'])){

    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $username, $password);
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
        header("Location: ../view/administrador/index.php");
        exit();
    } else {
        // Usuario no encontrado, mostrar mensaje de error
        echo "Nombre de usuario o contraseña incorrectos";
    }
} 

?>
