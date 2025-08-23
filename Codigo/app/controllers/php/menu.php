<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enrutamiento de URL  
if (isset($_GET["module"])) {
    $option = $_GET["module"];
    switch ($option) {
        case 'iniciar_sesion':
            $_SESSION['s1'] = true;
            $_SESSION['usuario'] = "efren";
            break;
        case 'cerrar_sesion':
            session_destroy();
            // Redireccionar a la página de inicio de sesión después de destruir la sesión
            header("Location: index.php?module=");
            exit;
            break;
    }
}

// Verificar si el usuario está autenticado.
if (!isset($_SESSION['s1'])) {
    require __DIR__ . '/../../views/login.php';
} else {
     require __DIR__ . '/../../views/dashboard.php';
}
?>
