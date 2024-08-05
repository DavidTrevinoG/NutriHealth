
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriHealth</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">NutriHealth</a>
    </nav>

    <div class="container mt-4" id="mainpan">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo(isset($_GET['controller']) && $_GET['controller'] == 'dietas_controller' ? 'active' : '') ?>" href="./index.php?controller=dietas_controller&action=index">Dietas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo(isset($_GET['controller']) && $_GET['controller'] == 'TipoEjerciciosController' ? 'active' : '') ?>" href="./index.php?controller=TipoEjerciciosController&action=index">Tipos de ejercicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo(isset($_GET['controller']) && $_GET['controller'] == 'ejercicios_controller' ? 'active' : '') ?>" href="./index.php?controller=ejercicios_controller&action=index">Ejercicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo(isset($_GET['controller']) && $_GET['controller'] == 'ClientesController' ? 'active' : '') ?>" href="./index.php?controller=ClientesController&action=index">Foro</a>
            </li>
        </ul>


        <?php

        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controllerName = $_GET['controller'];
            $actionName = $_GET['action'];
            $controllerFile = "controller/administrador/$controllerName.php";
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                $controller->$actionName();
            } else {
                echo "Error: El archivo del controlador no existe.";
            }
        } else {
            // Si no se especifica un controlador o acción, mostrar algo por defecto
            echo "<h3>Bienvenido a NutriHealth</h3>";
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>