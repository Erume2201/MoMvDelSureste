<?php
// Habilita la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Asegúrate de que estas rutas sean correctas
require 'CRUD.php';
require 'SQL.php';

// --- PASO 1: Define los datos de prueba ---
$test_email = 'efrenmar.0118@gmail.com';
$test_password = 'RumE010218'; // La contraseña en texto plano

// --- PASO 2: Realiza la consulta a la base de datos ---
$crud = new CRUD();
$query = SQL::getUsuario();
$paramTypes = "s";
$params = [$test_email];
$resultado = $crud->ConsultaPreparada($query, $paramTypes, $params);

// --- PASO 3: Verifica la existencia del usuario y la contraseña ---
if (!empty($resultado) && count($resultado) > 0) {
    $fila = $resultado[0];
    $contrasena_hash_db = $fila['contrasena_hash'];

    // Usa password_verify() para comparar la contraseña ingresada con el hash de la DB.
    if ($test_password === $contrasena_hash_db) {
        // La contraseña es correcta, prepara la respuesta de éxito.
        $obtencion = [
            "success" => true,
            "message" => "Inicio de sesión exitoso.",
            "usuario" => [
                "id_usuario" => $fila['id_usuario'],
                "nombre" => $fila['nombre'],
                "rol" => $fila['rol']
            ]
        ];
    } else {
        // La contraseña no coincide.
        $obtencion = ["success" => false, "message" => "Contraseña incorrecta."];
    }
} else {
    // El usuario no fue encontrado.
    $obtencion = ["success" => false, "message" => "Usuario no encontrado."];
}

// --- PASO 4: Muestra el resultado ---
echo "<h2>Resultado de la prueba:</h2>";
var_dump($obtencion);
?>