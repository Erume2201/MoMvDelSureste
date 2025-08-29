<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$module = $_GET['module'] ?? '';

if (!isset($_SESSION['s1'])) {
    // Si la sesión no está iniciada, solo se permite el login
    if ($module == 'iniciar_sesion') {
        $_SESSION['s1'] = true;
        $_SESSION['usuario'] = "Efren";
        // Redirigir al dashboard después de iniciar sesión
        header("Location: index.php");
        exit;
    } else {
        // Mostrar la vista de login para cualquier otra URL
        require __DIR__ . '/../../views/login.php';
    }
} else {
    // Si la sesión está iniciada, se maneja el enrutamiento principal
    switch ($module) {  
        case 'cerrar_sesion':
            session_destroy();
            header("Location: index.php");
            exit;
        case 'ver_cotizaciones':
            require __DIR__ . '/../../views/verCotizacion.php';
            break;
        case 'cotizar':
            require __DIR__ . '/../../views/cotizar.php';
            break;
        default:
            require __DIR__ . '/../../views/dashboard.php';
            break;
    }
}
