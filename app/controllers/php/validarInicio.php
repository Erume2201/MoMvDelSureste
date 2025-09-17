<?php
// En desarrollo se pueden mostrar errores, pero hay que asegurarnos que no impriman HTML antes del JSON.
// En producción se debería desactivar display_errors y loggear en archivos.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Forzar response JSON
header('Content-Type: application/json; charset=utf-8');

require '../objec/usuariosObj.php';

// Validar que lleguen los datos
if (isset($_POST['correo1']) && isset($_POST['pass2'])) {
    $correo = trim($_POST['correo1']);
    $pass = $_POST['pass2'];

    $instanciaUsuario = new Usuario();
    $instanciaUsuario -> setEmail($correo);
    $instanciaUsuario -> setContrasenaHash($pass);

    $resultado = $instanciaUsuario->validarInicioSesion();

    // Asegurarnos de que siempre devuelva rol si el login es correcto
    if ($resultado['success'] === true) {
        echo json_encode([
            "success" => true,
            "message" => "Bienvenido " . $resultado['usuario']['nombre'],
            "nombre" => $resultado['usuario']['nombre'],
            "rol" => $resultado['usuario']['rol'] // Aquí agregamos el rol
        ], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            "success" => false,
            "message" => $resultado['message'] ?? "Credenciales incorrectas."
        ], JSON_UNESCAPED_UNICODE);
    }
    exit;
} else {
    echo json_encode([
        "success" => false,
        "message" => "Datos de usuario o contraseña no recibidos."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}
?>