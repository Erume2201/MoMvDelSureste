<?php
require_once __DIR__ . '../../../../config/config.php';
require_once __DIR__ . '../../../../config/CRUD.php';

// Validar ID
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php?module=unidades&error=id_invalido");
    exit;
}

// Consultar unidad
$crud = new CRUD();
$unidad = $crud->select("SELECT * FROM unidades WHERE id_unidad = $id LIMIT 1");

if (!$unidad) {
    header("Location: index.php?module=unidades&error=no_encontrado");
    exit;
}

$unidad = $unidad[0]; // extraer el primer resultado

// Helper para escapar salida
function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
