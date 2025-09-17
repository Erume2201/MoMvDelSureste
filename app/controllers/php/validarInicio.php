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
    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
    exit;
}
?>