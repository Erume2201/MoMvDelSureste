<?php
require __DIR__ . '/../../config/CRUD.php';
require __DIR__ . '/../../config/SQL.php';
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
        // Consulta SQL desde SQL.php
        $query = SQL::getUsuario();
        // Ejecuta consulta con el nuevo CRUD (PDO)
        $fila = $this->crud->selectOne($query, [$this->email]);
        // Si se encontró un usuario
        if ($fila) {
            $contrasena_db = $fila['contrasena_hash']; // lo que está guardado en BD (hash)
            // Verificamos con password_verify
            if (password_verify($this->contrasena_hash, $contrasena_db)) {
                // Inicia sesión si no está iniciada
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

public function SetUser() {
    // Consulta para verificar si ya existe el email o RFC
    $query1 = SQL::getRfcGmail(); // SELECT COUNT(*) AS total FROM usuarios WHERE email = ? OR rfc = ?
    $validacionCampos = $this->crud->selectOne($query1, [$this->email, $this->rfc]);

    // Verificamos si ya existe algún usuario
    if ($validacionCampos['total'] > 0) {
        return [
            'success' => false,
            'dato' => $validacionCampos,
            'error' => 'El usuario, RFC o correo ya registrados.'
        ];
    }else {
        // No existe, insertamos el nuevo usuario
    $queryInsert = SQL::setUser();
    $insertar = $this->crud->insert($queryInsert, [
        $this->nombre,
        $this->apellidos,
        $this->rfc,
        $this->email,
        $this->contrasena_hash,
        $this->rol
    ]);

    // Retornamos el resultado del insert
    if ($insertar) {
        return [
            'success' => true,
            'mensaje' => 'Usuario registrado con éxito',
            'id_usuario' => $insertar
        ];
    } else {
        return [
            'success' => false,
            'error' => 'No se pudo registrar el usuario. Intente nuevamente.'
        ];
    }
    }

    
}

/**
     * regresa todos los usuarios de la db
     * @return array|false returna un array o false
     */
    public function getAllUsers() {
        try {
            $query = SQL::getUsuarios(); 
            // Use the selectAll() method from your CRUD class to fetch all results
            $users = $this->crud->select($query);
            return $users;
        } catch (Exception $e) {
            error_log("Error al obtener usuarios: " . $e->getMessage());
            return false;
        }
    }


/**
     * regresa si se actualiza o no el usuario
     * @return array|false returna un array o false
     */
    public function updateUser() {
    $queryUpdate = SQL::updateUser();
    $updateUser = $this->crud->update($queryUpdate, [
        $this->nombre,
        $this->apellidos,
        $this->rfc,
        $this->email,
        $this->rol,
        $this->id_usuario
    ]);

    // Retornamos el resultado del insert
    if ($updateUser) {
        return [
            'success' => true,
            'mensaje' => 'Usuario actualizado con éxito',
            'id_usuario' => $updateUser
        ];
    } else {
        return [
            'success' => false,
            'error' => 'No se logro actualizar el usuario. Intente nuevamente.'
        ];
    }
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