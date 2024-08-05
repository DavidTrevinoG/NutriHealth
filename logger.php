<?php

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerName = $_GET['controller'];
    $actionName = $_GET['action'];
    $controllerFile = "controller/usuario/$controllerName.php";
    
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerName();
        $controller->$actionName();
        echo "<script>alert('".$controllerFile."');</script>";
    } else {
        echo "Error: El archivo del controlador no existe.";
    }
} else {
    // Si no se especifica un controlador o acción, mostrar algo por defecto
    echo "<h3>Bienvenido a NutriHealth</h3>";
}
?>
