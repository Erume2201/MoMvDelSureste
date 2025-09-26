<?php
require_once __DIR__ . '../../../../config/config.php';
require_once __DIR__ . '../../../../config/CRUD.php';

// Validar ID
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php?module=tiendas&error=id_invalido");
    exit;
}

// Consultar tienda (incluyendo el nombre del cliente asociado)
$crud = new CRUD();
$sql = "SELECT t.*, c.nombre_cliente
        FROM tiendas t
        JOIN clientes c ON t.id_cliente = c.id_cliente
        WHERE t.id_cliente = $id
        LIMIT 1";
$tienda = $crud->select($sql);

if (!$tienda) {
    header("Location: index.php?module=tiendas&error=no_encontrado");
    exit;
}

$tienda = $tienda[0]; // extraer el primer resultado

// Helper para escapar salida
function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
