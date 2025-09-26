<?php
// Incluye la clase Usuario donde se encuentra el método getAllUsers()
require_once __DIR__ . '../../../objec/usuariosObj.php';
// Asegúrate de que solo se procesen solicitudes POST para la edición
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

// 1. Verificar si existen los datos esenciales
if (!isset($_POST['id_usuario'])) {
    echo json_encode(['success' => false, 'message' => 'ID de usuario no proporcionado.']);
    exit;
}

// 2. Obtener y limpiar/sanear los datos del formulario
// Es crucial sanear y validar todos los datos antes de usarlos en una consulta SQL.

$id_usuario = intval($_POST['id_usuario']); // Convertir a entero para seguridad
$nombre     = htmlspecialchars(trim($_POST['nombre']));
$apellidos  = htmlspecialchars(trim($_POST['apellidos']));
$rfc        = htmlspecialchars(trim($_POST['rfc']));
$email      = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanear el email
$rol        = htmlspecialchars(trim($_POST['rol']));

$instanciaUsuario = new Usuario();
$instanciaUsuario -> setIdUsuario($id_usuario);
$instanciaUsuario -> setNombre($nombre);
$instanciaUsuario -> setApellidos($apellidos);
$instanciaUsuario -> setRfc($rfc);
$instanciaUsuario -> setEmail($email);
$instanciaUsuario -> setRol($rol);

$resultado = $instanciaUsuario ->updateUser();

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

// 3. Realizar la Validación de Datos (Ejemplo)
if (empty($nombre) || empty($apellidos) || empty($rfc) || empty($email) || empty($rol)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'El formato del email no es válido.']);
    exit;
}
?>