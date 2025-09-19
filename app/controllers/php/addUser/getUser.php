<?php
// Establece el encabezado para que el navegador sepa que la respuesta es JSON
header('Content-Type: application/json');

// Incluye la clase Usuario donde se encuentra el método getAllUsers()
require_once __DIR__ . '../../../objec/usuariosObj.php';

try {
    // Instancia la clase Usuario
    $instanciaUsuario = new Usuario();

    // Llama al método para obtener todos los usuarios
    $usuarios = $instanciaUsuario->getAllUsers();

    // Verifica si la consulta fue exitosa
    if ($usuarios !== false) {
        // Devuelve los datos de los usuarios en formato JSON
        echo json_encode(['success' => true, 'data' => $usuarios], JSON_UNESCAPED_UNICODE);
    } else {
        // Devuelve un mensaje de error si la consulta falló
        echo json_encode(['success' => false, 'message' => 'Error al obtener usuarios de la base de datos.'], JSON_UNESCAPED_UNICODE);
    }

} catch (Exception $e) {
    // Captura cualquier excepción y devuelve un mensaje de error genérico
    echo json_encode(['success' => false, 'message' => 'Ocurrió un error en el servidor.'], JSON_UNESCAPED_UNICODE);
}
?>