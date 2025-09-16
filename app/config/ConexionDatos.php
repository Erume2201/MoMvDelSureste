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
?>




<?php
// class ConexionDatos {
//     protected $servidor = "localhost";
//     protected $usuario = "root";
//     protected $password = "";
//     protected $db = "gestion_recoleccion";
//     public $conexion;

//     // Constructor
//     function __construct() {
//        $this->conexion = $this->obtenerConexion();
//     }

//     // Función para obtener una conexión a la base de datos MySQL
//     public function obtenerConexion() {
//         // Establecer una conexión con la base de datos
//         $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->db);
//         if (!$this->conexion) {
//             die('Error de conexión: ' . mysqli_connect_error());
//         }
//         // Retornar la conexión
//         return $this->conexion;
//     }
// }
?>
