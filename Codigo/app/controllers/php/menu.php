<?php
// Iniciar la sesión solo si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
   
// Enrutamiento de URL  
if (isset($_GET["module"])) {
    $option = $_GET["module"];
    switch ($option) {
        case '#1':
            break;
        case '#2':
            break;
        case '#3':
            break;
        case '#4':
                break;    
        default:
            // Acción por defecto
            break;
    }
}


// Verificar si el usuario está autenticado.
if (!isset($_SESSION['s1'])) {
    require 'app/views/dashboard.php';
} else {
    // El usuario está autenticado, puedes mostrar la interfaz principal
    require 'app/views/login.php';
}

?>