<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriHealth</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="indexUsuario.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-background text-foreground">

<header>
    <a href="indexNutriHealth.php" class="text-2xl font-bold">NutriHealth</a>
    <nav class="hidden md:flex">
      <a class="<?php echo (isset($_GET['controller']) && $_GET['controller'] == 'dietas_controller' ? 'active' : '') ?>" href="./indexNutriHealth.php?controller=dietas_controller&action=index">Dietas</a>
      <a class="<?php echo (isset($_GET['controller']) && $_GET['controller'] == 'ejercicios_controller' ? 'active' : '') ?>" href="./indexNutriHealth.php?controller=ejercicios_controller&action=index">Ejercicios</a>
      <a class="<?php echo (isset($_GET['controller']) && $_GET['controller'] == 'ClientesController' ? 'active' : '') ?>" href="./indexNutriHealth.php?controller=ClientesController&action=index">Foro</a>
      <a class="<?php echo (isset($_GET['controller']) && $_GET['controller'] == 'ClientesController' ? 'active' : '') ?>" href="./indexNutriHealth.php?controller=ClientesController&action=index">Perfil</a>
      <a class="<?php echo (isset($_GET['controller']) && $_GET['controller'] == 'AuthController' ? 'active' : '') ?>" href="./indexNutriHealth.php?controller=AuthController&action=cerrarSesion">Cerrar Sesión</a>
    </nav>
</header>

<main class="container mt-4">
<?php

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerName = $_GET['controller'];
    $actionName = $_GET['action'];

    $controllerFile = "/controller/usuario/".$controllerName.".php";
    echo "<script>alert('".$controllerFile."');</script>";
    echo "<script>alert('".$actionName."');</script>";
    if (file_exists($controllerFile)) {
        echo "<script>alert('".$controllerName."');</script>";
        require_once $controllerFile;
        $controller = new $controllerName();
        $controller->$actionName();
    } else {
        echo "Error: El archivo del controlador no existe.";
    }
} else {
    // Si no se especifica un controlador o acción, mostrar algo por defecto
    require_once 'controller/usuario/index_controller.php';
    $controller = new index_controller();
    $controller->index();
}
?>
</main>


<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>
</html>
