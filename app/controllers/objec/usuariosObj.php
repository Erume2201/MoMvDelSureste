<?php
require '../../config/CRUD.php';
require '../../config/SQL.php';
class Usuario {
    // Atributos que corresponden a las columnas de la tabla 'usuarios'
    private $crud;
    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $rfc;
    private $email;
    private $contrasena_hash;
    private $rol;
    
     public function __construct()
    {
        $crudInicio = new CRUD;
        $this->crud= $crudInicio;  //accedemos a la funcion que queremos en CRUD 
    }
    // Método para validar el inicio de sesión
   public function validarInicioSesion() {
    // Obtenemos todos los datos del usuario por su correo
    $query = SQL::getUsuario(); 
    $paramTypes = "s"; // enteros i : cadenas s
    $params = array($this->email);
    $respuesta = $this->crud->ConsultaPreparada($query, $paramTypes, $params);

    // Si se encontró un usuario
    if (!empty($respuesta) && count($respuesta) > 0) {
        $fila = $respuesta[0];
        $contrasena_db = $fila['contrasena_hash'];
        
        // Compara la contraseña ingresada directamente con la que está en texto plano en la base de datos
        // **ADVERTENCIA:** Esto es inseguro y solo para pruebas
        if ($this -> contrasena_hash === $contrasena_db) {
            // Si la contraseña es correcta, devuelve los datos del usuario
            return array(
                "success" => true,
                "message" => "Inicio de sesión exitoso.",
                "usuario" => array(
                    "id_usuario" => $fila['id_usuario'],
                    "nombre" => $fila['nombre'],
                    "rol" => $fila['rol']
                )
            );
        }
    }

    // Si no se encuentra el usuario o la contraseña es incorrecta
    return array("success" => false, "message" => "Correo o contraseña incorrectos.");
}

    // Métodos Get y Set para id_usuario
    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    // Métodos Get y Set para nombre
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Métodos Get y Set para apellidos
    public function getApellidos() {
        return $this->apellidos;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    // Métodos Get y Set para rfc
    public function getRfc() {
        return $this->rfc;
    }
    public function setRfc($rfc) {
        $this->rfc = $rfc;
    }

    // Métodos Get y Set para email
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    // Métodos Get y Set para contrasena_hash
    public function getContrasenaHash() {
        return $this->contrasena_hash;
    }
    public function setContrasenaHash($contrasena_hash) {
        $this->contrasena_hash = $contrasena_hash;
    }

    // Métodos Get y Set para rol
    public function getRol() {
        return $this->rol;
    }
    public function setRol($rol) {
        $this->rol = $rol;
    }
}
?>