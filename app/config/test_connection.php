<?php
// Include the class file
require 'ConexionDatos.php';

// Create an instance of the class
$db_connection_test = new ConexionDatos();

// Access the connection property to check its status
if ($db_connection_test->conexion) {
    echo "¡Conexión exitosa a la base de datos!";
} else {
    // The 'die' in the class will handle the error message,
    // but this provides a simple confirmation.
    echo "Fallo en la conexión a la base de datos.";
}

// You can also use var_dump for more detailed information
// var_dump($db_connection_test->conexion);
?>