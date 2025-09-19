<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nombre    = $_POST['nombre']    ?? null;
        $apellidos = $_POST['apellidos'] ?? null;
        $rfc       = $_POST['rfc']       ?? null;
        $correo    = $_POST['correo']    ?? null;
        $clave     = password_hash($_POST['clave'] ?? null, PASSWORD_DEFAULT);
        $rol       = $_POST['rol']       ?? null;

        // Simulating the commented-out code to show the intended logic
        require '../../objec/usuariosObj.php';
        //Asignacion de varibales a los Objetos de UsuariOObj
        $instanciaUsuario = new Usuario();
        $instanciaUsuario -> setNombre($nombre);
        $instanciaUsuario -> setApellidos($apellidos);
        $instanciaUsuario -> setRfc($rfc);
        $instanciaUsuario -> setEmail($correo);
        $instanciaUsuario -> setContrasenaHash($clave);
        $instanciaUsuario -> setRol($rol);

        //Función de agregarDatos
        $resultado = $instanciaUsuario->SetUser();
        echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

    } catch (Exception $e) {
        echo json_encode([
            'exito'   => false,
            'mensaje' => 'Ocurrió un error en el servidor.',
            'error'   => $e->getMessage()
        ]);
    }

} else {
    echo json_encode([
        'exito'   => false,
        'mensaje' => 'Método no permitido.'
    ]);
}
?>