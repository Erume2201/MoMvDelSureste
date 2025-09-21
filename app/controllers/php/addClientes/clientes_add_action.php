<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/CRUD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recibimos datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $rfc = $_POST['rfc'] ?? '';
        $domicilio = $_POST['domicilio'] ?? '';
        $colonia = $_POST['colonia'] ?? '';
        $ciudad = $_POST['ciudad'] ?? '';
        $estado = $_POST['estado'] ?? '';
        $cp = $_POST['cp'] ?? '';
        $tipo_localidad = $_POST['tipo_localidad'] ?? '';
        $apoderado = $_POST['apoderado'] ?? '';
        $forma_pago = $_POST['forma_pago'] ?? '';
        $metodo_pago = $_POST['metodo_pago'] ?? '';
        $uso_cfdi = $_POST['uso_cfdi'] ?? '';
        $regimen = $_POST['regimen'] ?? '';
        $contacto = $_POST['contacto'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        // Validaciones básicas
        if (empty($nombre) || empty($rfc) || empty($email)) {
            throw new Exception("Campos obligatoríos vacíos.");
        }

        // Insertar en BD con CRUD
        $crud = new CRUD();
        $sql = "INSERT INTO clientes
                (nombre_cliente, rfc, domicilio_fiscal, colonia, ciudad, estado, codigo_postal, tipo_localidad, nombre_apoderado, 
                forma_pago, metodo_pago, uso_cfdi, regimen_fiscal, contacto_cuentas, email, telefono)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = [$nombre, $rfc, $domicilio, $colonia, $ciudad, $estado, $cp, $tipo_localidad, 
                   $apoderado, $forma_pago, $metodo_pago, $uso_cfdi, $regimen, $contacto, $email, $telefono];
        
        $id = $crud->insert($sql, $params);

        // Redirigir con éxito
        header("Location: " . BASE_URL . "index.php?module=clientes&msg=cliente_agregado");
        exit;
   
    } catch (Exception $e) {
        // Debug temporal
        die("Error al insertar cliente: " . $e->getMessage());
        // Redirigir con error
        header("Location: " . BASE_URL . "index.php?module=clientes_add&error=" . urlencode("Hubo un error al registrar el cliente"));
        exit;
    } 
} 
else {
        header("Location: clientes_add.php");
        exit;
}