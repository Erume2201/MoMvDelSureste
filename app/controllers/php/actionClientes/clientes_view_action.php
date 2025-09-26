<?php
require_once __DIR__ . '../../../../config/config.php';
require_once __DIR__ . '../../../../config/CRUD.php';

// --- ARREGLOS DE TRADUCCIÓN DE CÓDIGOS FISCALES ---
// Forma de pago
const FORMA_PAGO_MAP = [
    '01' => '01 - Efectivo',
    '02' => '02 - Cheque nominativo',
    '03' => '03 - Transferencia electrónica de fondos',
];

// Método de pago
const METODO_PAGO_MAP = [
    'PUE' => 'PUE - Pago en una sola exhibición',
    'PPD' => 'PPD - Pago en parcialidades o diferido',
];

// Uso CFDI
const USO_CFDI_MAP = [
    'G01' => 'G01 - Adquisición de mercancías',
    'P01' => 'P01 - Por definir',
];

// Régimen Fiscal
const REGIMEN_FISCAL_MAP = [
    '601' => '601 - General de Ley Personas Morales',
    '605' => '605 - Sueldos y Salarios',
];

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
