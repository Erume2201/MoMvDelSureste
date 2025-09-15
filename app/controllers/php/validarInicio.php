<?php
// Habilita la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require '../objec/usuariosObj.php';
error_reporting(E_ALL);

if (isset($_POST['correo1']) && isset($_POST['pass2'])) {
    $correo = $_POST['correo1'];
    $pass = $_POST['pass2'];
    $instanciaUsuario = new Usuario();
    $instanciaUsuario -> setEmail($correo);
    $instanciaUsuario -> setContrasenaHash($pass);
    $resultado = $instanciaUsuario->validarInicioSesion();
    echo json_encode($resultado);
} else {
    echo json_encode(array(
        "success" => false, 
        "message" => "Datos de usuario o contraseña no recibidos."
    ));
}
?>