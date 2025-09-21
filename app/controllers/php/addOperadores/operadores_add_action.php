<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibimos datos del formulario
        $nombreOperador = $_POST['nombre_operador'] ?? '';
        $apellidosOperador = $_POST['apellidos_operador'] ?? '';
        $licencia = $_POST['licencia'] ?? '';
        $tipoLicencia = $_POST['tipo_licencia'] ?? '';

        // Validaciones básicas
        if (empty($nombreOperador) || empty($apellidosOperador) || empty($licencia) || empty($tipoLicencia)) {
            throw new Exception("Campos obligatoríos vacíos.");
        }

        // Insertar en BD con CRUD
        $crud = new CRUD();
        $sql = "INSERT INTO operadores
                (nombre, apellidos, licencia, tipo_licencia)
                VALUES (?, ?, ?, ?)";

        $params = [$nombreOperador, $apellidosOperador, $licencia, $tipoLicencia];
        
        $id = $crud->insert($sql, $params);

        // Redirigir con éxito
        header("Location: " . BASE_URL . "index.php?module=operadores&msg=operador_agregado");
        exit;
   
    } catch (Exception $e) {
        // Debug temporal
        die("Error al insertar operador: " . $e->getMessage());
        // Redirigir con error
        header("Location: " . BASE_URL . "index.php?module=operadores_add&error=" . urlencode("Hubo un error al registrar el operador"));
        exit;
    } 
} 
else {
        header("Location: operadores_add.php");
        exit;
}