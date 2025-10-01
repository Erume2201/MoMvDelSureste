<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibimos datos del formulario
        $tipoUnidad = $_POST['tipo_unidad'] ?? '';
        $numeroEconomico = $_POST['numero_economico'] ?? '';
        $placas = $_POST['placas'] ?? '';
        $numeroSerie = $_POST['numero_serie'] ?? '';
        $polizaSeguro = $_POST['poliza_seguro'] ?? '';

        // Validaciones básicas
        if (empty($tipoUnidad) || empty($numeroEconomico) || empty($placas) || empty($numeroSerie) || empty($polizaSeguro)) {
            throw new Exception("Campos obligatoríos vacíos.");
        }

        // Insertar en BD con CRUD
        $crud = new CRUD();
        $sql = "INSERT INTO unidades
                (tipo_unidad, numero_economico, placas, numero_serie, poliza_seguro)
                VALUES (?, ?, ?, ?, ?)";

        $params = [$tipoUnidad, $numeroEconomico, $placas, $numeroSerie, $polizaSeguro];
        
        $id = $crud->insert($sql, $params);

        // Redirigir con éxito
        header("Location: " . BASE_URL . "index.php?module=unidades&msg=unidad_agregada");
        exit;
   
    } catch (Exception $e) {
        // Debug temporal
        die("Error al insertar unidad: " . $e->getMessage());
        // Redirigir con error
        header("Location: " . BASE_URL . "index.php?module=unidades_add&error=" . urlencode("Hubo un error al registrar la unidad"));
        exit;
    } 
} 
else {
        header("Location: unidades_add.php");
        exit;
}