<?php
class ConexionDatos {
    private $host = "localhost";
    private $dbname = "gestion_recoleccion";
    private $usuario = "root"; // usuario
    private $contrasena = ""; // contraseña 
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO (
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->usuario,
                $this->contrasena,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Errores, lanza excepciones
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Resultados en array asociativo
                    PDO::ATTR_EMULATE_PREPARES => false, // Usar prepares nativos
                ]
            );
        } catch (PDOException $e) {
            die("❌ Error de conexión a la BD: " .$e->getMessage());
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}