<?php
// Captura el valor del modulo a acceder
$module = $_GET['module'] ?? '';
// 1. Manejo del módulo de firma, que no requiere sesión.
//    Si la URL es ?module=firmar_cotizacion, se carga la vista y se detiene la ejecución.
if ($module === 'firmar_cotizacion') {
    require __DIR__ . '/../../views/firmaCliente/firmar.php';
    exit;
}

// 2. Manejo de módulos que SÍ requieren una sesión activa.
//    Si la sesión no está iniciada y el módulo no es 'firmar_cotizacion', redirige al login.
if (!isset($_SESSION['s1'])) {
    if ($module === 'iniciar_sesion') {
        $_SESSION['s1'] = true;
        header("Location: index.php");
        exit;
    } else {
        // Para cualquier otro módulo no permitido sin sesión, se muestra el login.
        require __DIR__ . '/../../views/login/login.php';
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
    case 'usuarios':
        require __DIR__ . '/../../views/usuarios/usuarios.php';
        break;
    case 'usuarios_add':
        require __DIR__ . '/../../views/usuarios/usuarios_add.php';
        break;
    case 'ver_Contratos':
        require __DIR__ . '/../../views/contratos/verContratos.php';
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
    case 'operadores':
        require __DIR__ . '/../../views/operadores/operadores.php';
        break;
    case 'operadores_add':
        require __DIR__ . '/../../views/operadores/operadores_add.php';
        break;
    case 'unidades':
        require __DIR__ . '/../../views/unidades/unidades.php';
        break;
    case 'unidades_add':
        require __DIR__ . '/../../views/unidades/unidades_add.php';
        break;
    case 'contratos':
        require __DIR__ . '/../../views/contratos/contratos.php';
        break;
    case 'contratos_add':
        require __DIR__ . '/../../views/contratos/contratos_add.php';
        break;
    default:
        // Si la sesión está activa y no se especifica un módulo, muestra el dashboard.
        require __DIR__ . '/../../views/dashboard/dashboard.php';
        break;
}
?>
