<?php
require_once __DIR__ . '../../../../config/config.php';
require_once __DIR__ . '../../../../config/CRUD.php';

// Validar ID
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php?module=clientes&error=id_invalido");
    exit;
}

// Consultar cliente
$crud = new CRUD();
$cliente = $crud->select("SELECT * FROM clientes WHERE id_cliente = $id LIMIT 1");

if (!$cliente) {
    header("Location: index.php?module=clientes&error=no_encontrado");
    exit;
}

$cliente = $cliente[0]; // extraer el primer resultado

// Helper para escapar salida
function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
