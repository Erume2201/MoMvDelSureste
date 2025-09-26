<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibimos datos del formulario
        $nombreTienda = $_POST['nombre_tienda'] ?? '';
        $id_cliente = $_POST['id_cliente'] ?? '';
        $numeroAmbiental = $_POST['numero_ambiental'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        $colonia = $_POST['colonia'] ?? '';
        $ciudad = $_POST['ciudad'] ?? '';
        $estado = $_POST['estado'] ?? '';
        $cpTienda = $_POST['cp_tienda'] ?? '';
        $horario = $_POST['horario_trabajo'] ?? '';
        $nombreResponsable = $_POST['nombre_responsable'] ?? '';
        $telResponsable = $_POST['telefono_responsable'] ?? '';
        $refesRecoleccion = $_POST['refes_recoleccion'] ?? '';
        $coordenadas = $_POST['coordenadas_gmaps'] ?? '';

        // Validaciones básicas
        if (empty($nombreTienda) || empty($id_cliente) || empty($numeroAmbiental) || empty($direccion)
             || empty($colonia) || empty($ciudad) || empty($estado) || empty($cpTienda)
             || empty($horario) || empty($nombreResponsable) || empty($telResponsable)
             || empty($refesRecoleccion) || empty($coordenadas)) {
            throw new Exception("Campos obligatoríos vacíos.");
        }

        // Insertar en BD con CRUD
        $crud = new CRUD();
        $sql = "INSERT INTO tiendas
                (nombre_tienda, id_cliente, numero_ambiental, direccion, colonia, ciudad, estado, 
                cp_tienda, horario_trabajo, nombre_responsable, telefono_responsable,
                refes_recoleccion, coordenadas_gmaps)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = [$nombreTienda, $id_cliente, $numeroAmbiental, $direccion, $colonia, $ciudad, $estado, $cpTienda,
                   $horario, $nombreResponsable, $telResponsable, $refesRecoleccion, $coordenadas];
        
        $id = $crud->insert($sql, $params);

        // Redirigir con éxito
        header("Location: " . BASE_URL . "index.php?module=tiendas&msg=tienda_agregada");
        exit;
   
    } catch (Exception $e) {
        // Debug temporal
        die("Error al insertar tienda: " . $e->getMessage());
        // Redirigir con error
        header("Location: " . BASE_URL . "index.php?module=tiendas_add&error=" . urlencode("Hubo un error al registrar la tienda"));
        exit;
    } 
} 
else {
        header("Location: tiendas_add.php");
        exit;
}