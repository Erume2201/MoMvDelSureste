<?php
require_once __DIR__ . '../../../../config/config.php';
require_once __DIR__ . '../../../../config/CRUD.php';

// --- ARREGLOS DE TRADUCCIÓN PARA TIPO DE LICENCIA---
const TIPO_LICENCIA_MAP = [
    'A' => 'A - Motocicletas y ciclomotores',
    'B' => 'B - Automóviles y camionetas particulares',
    'C' => 'C - Transporte de pasajeros (hasta 10 personas)',
    'D' => 'D - Transporte de servicio público',
    'E' => 'E - Carga de gran tamaño y doble articulación',
    'F' => 'F - Vehículos especiales',
];

// Validar ID
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php?module=operadores&error=id_invalido");
    exit;
}

// Consultar operador
$crud = new CRUD();
$operador = $crud->select("SELECT * FROM operadores WHERE id_operador = $id LIMIT 1");

if (!$operador) {
    header("Location: index.php?module=operadores&error=no_encontrado");
    exit;
}

$operador = $operador[0]; // extraer el primer resultado

// Helper para escapar salida
function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
