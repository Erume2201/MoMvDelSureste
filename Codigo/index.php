<?php
session_start();

#controlador de inicio de sesion
require __DIR__ . '/app/controllers/php/menu.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
   
    <!-- Estilos de letras -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,800&family=Roboto:wght@700;900&display=swap"
        rel="stylesheet">
    <!-- TERMINA ESTILO DE LETRAS -->
    
    <!--icono en la pestaña-->
    <!--<link rel="icon" href="assets/img/logoSearchBookCrodeV2.ico" type="image/x-icon"> ->

    <!-- Graficación -->
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <title>RECOLECCION DE HIDROCARBUROS</title>
</head>

<body>
    <!-- Formulario Login.. -->
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

<!-- Opcional: Agregar scripts de JavaScript (Popper.js y Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>








<!--
$controller = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) . 'Controller' : 'DashboardController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = "app/controllers/$controller.php";

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    if (class_exists($controller)) {
        $objController = new $controller();
        if (method_exists($objController, $action)) {
            $objController->$action();
        } else {
            require 'app/views/error404.php';
        }
    } else {
        require 'app/views/error404.php';
    }
} else {
    require 'app/views/error404.php';
} -->

