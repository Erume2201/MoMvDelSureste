<?php
// Obtenemos el archivo conexion.php para poder obtener la conexión
require_once "ConexionDatos.php";

class CRUD {
    private $conexion; 

    public function __construct() {  
        $db = new ConexionDatos();
        $this->conexion = $db->obtenerConexion();       
    }
  
    /**
     * Ejecuta una consulta SELECT y retorna todos los resultados.
     */
    public function select($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(); // Devuelve array de resultados
    }

    /**
     * Ejecuta una consulta SELECT y retorna solo un registro.
     */
    public function selectOne($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(); // Devuelve un solo resultado
    }

    /**
     * Ejecuta una consulta INSERT y retorna el ID insertado.
     */
    public function insert($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $this->conexion->lastInsertId(); // Devuelve el último ID insertado
    }

    /**
     * Ejecuta una consulta UPDATE y retorna filas afectadas.
     */
    public function update($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount(); // Devuelve número de filas afectadas
    }

    /**
     * Ejecuta una consulta DELETE y retorna filas afectadas.
     */
    public function delete($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}