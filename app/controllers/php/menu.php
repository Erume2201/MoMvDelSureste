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

// 3. Definición de permisos por rol
// Se puede ajustar roles y módulos según crezcan
$permissions = [
    'administrador' => [
        'usuarios', 'usuarios_add',
        'clientes', 'clientes_add', 'clientes_view',
        'tiendas', 'tiendas_add', 'tiendas_view',
        'operadores', 'operadores_add',
        'unidades', 'unidades_add',
        'contratos', 'contratos_add', 'contratos_ver',
        // En futuro: viajes
    ],
    'supervisor' => [
        'clientes', 'clientes_add',
        'tiendas', 'tiendas_add',
        'operadores',
        'unidades',
        'contratos_ver'
    ],
    'operador' => [
        'operadores'
    ]
];

// Rol actual de la sesión
$rol = $_SESSION['rol'] ?? 'operador'; // por defecto operador si no está definido

// Función para verificar permisos
function tieneAcceso($rol, $modulo, $permissions) {
    return isset($permissions[$rol]) && in_array($modulo, $permissions[$rol]);
}

// 4. Enrutamiento con validación de permisos 
switch ($module) {
    case 'cerrar_sesion':
        session_destroy();
        header("Location: index.php");
        exit;

    // Usuarios
    case 'usuarios':
    case 'usuarios_add':
    // Clientes
    case 'clientes':
    case 'clientes_add':
    case 'clientes_view':
    // Tiendas
    case 'tiendas':
    case 'tiendas_add':
    case 'tiendas_view':
    // Operadores
    case 'operadores':
    case 'operadores_add':
    // Unidades
    case 'unidades':
    case 'unidades_add':
    // Contratos
    case 'contratos':
    case 'contratos_add':
    case 'contratos_ver':
        if (tieneAcceso($rol, $module, $permissions)) {
            // Dividir el nombre del módulo en carpeta y archivo
            $parts = explode('_', $module, 2);
            $carpeta = $parts[0]; // usuarios, clientes, tiendas, etc
            $archivo = $module . '.php'; // usuarios_add.php, clientes_add.php, etc

            require __DIR__ . "/../../views/$carpeta/$archivo";
        } else {
            require __DIR__ . '/../../views/errors/acceso_denegado.php';
        }
        break;
        
    default:
        // Si la sesión está activa y no se especifica un módulo, muestra el dashboard.
        require __DIR__ . '/../../views/dashboard/dashboard.php';
        break;
}
?>
