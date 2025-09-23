<?php
// Ruta correcta desde get_clientes.php a la carpeta 'config'
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

// Establecer el tipo de contenido como JSON
header('Content-Type: application/json');

// Recibir el término de búsqueda
$searchTerm = $_GET['term'] ?? '';

// Validar que el término no esté vacío
if (empty($searchTerm)) {
    echo json_encode([]);
    exit;
}

try {
    // Instanciar CRUD y preparar la consulta
    $crud = new CRUD();
    
    // Corregir la consulta SQL para usar LIKE con el comodín %
    $sql = "SELECT id_cliente, nombre_cliente FROM clientes WHERE nombre_cliente LIKE ? ORDER BY nombre_cliente ASC LIMIT 10";
    $params = ["%" . $searchTerm . "%"];

    // Ejecutar la consulta y obtener los resultados
    $clientes = $crud->select($sql, $params);

    // Enviar los resultados como JSON
    echo json_encode($clientes);

} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500);
    echo json_encode(['error' => 'Error al buscar clientes: ' . $e->getMessage()]);
}