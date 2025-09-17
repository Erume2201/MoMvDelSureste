<?php
require '../../config/ConexionDatos.php';
require '../../config/CRUD.php';

$crud = new CRUD();

// Traer todos los usuarios actuales
$usuarios = $crud->select("SELECT id_usuario, contrasena_hash FROM usuarios");

foreach ($usuarios as $u) {
    $id = $u['id_usuario'];
    $plainPass = $u['contrasena_hash']; // texto plano actual
    $hashed = password_hash($plainPass, PASSWORD_DEFAULT);

    // Actualizar a hash
    $crud->update("UPDATE usuarios SET contrasena_hash = ? WHERE id_usuario = ?", [$hashed, $id]);

    echo "Usuario $id convertido correctamente<br>";
}

echo "<hr>Conversión completa. Ahora todas las contraseñas están con hash.";
