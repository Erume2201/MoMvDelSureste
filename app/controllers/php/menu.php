<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Captura el valor del modulo a acceder
$module = $_GET['module'] ?? '';
$correo = $_GET['correo1'] ?? '';
$pasw = $_GET['pass'] ?? '';


// 1. Manejo del módulo de firma, que no requiere sesión.
//    Si la URL es ?module=firmar_cotizacion, se carga la vista y se detiene la ejecución.
if ($module === 'firmar_cotizacion') {
    require __DIR__ . '/../../views/firmar.php';
    exit;
}

// 2. Manejo de módulos que SÍ requieren una sesión activa.
//    Si la sesión no está iniciada y el módulo no es 'firmar_cotizacion', redirige al login.
if (!isset($_SESSION['s1'])) {
    if ($module === 'iniciar_sesion') {
        $_SESSION['s1'] = true;
        $_SESSION['usuario'] = $correo;
        header("Location: index.php");
        exit;
    } else {
        // Para cualquier otro módulo no permitido sin sesión, se muestra el login.
        require __DIR__ . '/../../views/login.php';
        exit;
    }
}

// 3. Lógica de enrutamiento para usuarios con sesión activa.
//    Solo se ejecuta si la sesión está iniciada.
switch ($module) {
    case 'cerrar_sesion':
        session_destroy();
        header("Location: index.php");
        exit;
    case 'ver_Contratos':
        require __DIR__ . '/../../views/verCotizacion.php';
        break;
    case 'cotizar':
        require __DIR__ . '/../../views/cotizar.php';
        break;
    case 'clientes':
        require __DIR__ . '/../../views/clientes/clientes.php';
        break;
    case 'clientes_add':
        require __DIR__ . '/../../views/clientes/clientes_add.php';
        break;
    case 'tiendas':
        require __DIR__ . '/../../views/tiendas/tiendas.php';
        break;
    case 'tiendas_add':
        require __DIR__ . '/../../views/tiendas/tiendas_add.php';
        break;
    default:
        // Si la sesión está activa y no se especifica un módulo, muestra el dashboard.
        require __DIR__ . '/../../views/dashboard.php';
        break;
}
?>
