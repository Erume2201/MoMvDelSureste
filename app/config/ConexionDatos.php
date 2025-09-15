<?php
class ConexionDatos {
    protected $servidor = "localhost";
    protected $usuario = "root";
    protected $password = "";
    protected $db = "gestion_recoleccion";
    public $conexion;

    // Constructor
    function __construct() {
       $this->conexion = $this->obtenerConexion();
    }

    // Función para obtener una conexión a la base de datos MySQL
    public function obtenerConexion() {
        // Establecer una conexión con la base de datos
        $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->db);
        if (!$this->conexion) {
            die('Error de conexión: ' . mysqli_connect_error());
        }
        // Retornar la conexión
        return $this->conexion;
    }
}
?>
