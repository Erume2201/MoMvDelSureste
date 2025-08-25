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
            $_SESSION['usuario'] = "Efren";

            break;
        case 'cerrar_sesion':
            session_destroy();
            // Redireccionar a la página de inicio de sesión después de destruir la sesión
            header("Location: index.php?module=");
            exit;
            break;
        case 'ver_cotizaciones':
            header("Location: index.php?module=ver_cotizaciones_page");
          #  require __DIR__ . '/../../views/verCotizacion.php';
            break;
    }
}

if (!isset($_SESSION['s1'])) {
    require __DIR__ . '/../../views/login.php';
} else {
    if (isset($_GET['module']) && $_GET['module'] == 'ver_cotizaciones_page') {
        require __DIR__ . '/../../views/verCotizacion.php';
    } else {
        require __DIR__ . '/../../views/dashboard.php';
    }
}
?>
