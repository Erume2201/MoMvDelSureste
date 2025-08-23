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
   // Usuario NO autenticado → mostrar login
    require __DIR__ . '/../../views/login.php';
} else {
    // Usuario autenticado → mostrar dashboard
    require __DIR__ . '/../../views/dashboard.php';
}

?>