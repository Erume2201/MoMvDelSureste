<?php
// Obtenemos el archivo conexion.php para poder obtener la conexión
require "ConexionDatos.php";

class CRUD {
    private $conexion; 
    public function __construct()
    {  
        $inicio = new ConexionDatos;
        $this->conexion = $inicio->obtenerConexion();
    }
  
    public function ConsultaPreparada($query, $paramTypes = '', $params = array()) {
        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $query);
        // Verificar si se pudo preparar la consulta
        if (!$stmt) {
            die('Error en la consulta preparada: ' . mysqli_error($this->conexion));
        }
        // Si se proporcionaron parámetros, vincularlos a la consulta
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        }
        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);
    
        if (!$resultado) {
            die('Error en la ejecución de la consulta preparada: ' . mysqli_stmt_error($stmt));
        }
        // Obtener resultados (si es una consulta SELECT)
        $resultadosArray = array();
        $result = mysqli_stmt_get_result($stmt);
        while ($fila = mysqli_fetch_assoc($result)) {
            $resultadosArray[] = $fila;
        }
        // Cerrar el statement
        mysqli_stmt_close($stmt);
        // Retornar los resultados almacenados en el array
        return $resultadosArray;
    }

    
    

    /**
     * Este método sirve para actualizar el estatus del usuario.
     * Recibe como parámetro el correo electrónico.
     * Retorna un booleano.
     */
    public function Actualizar($query, $paramTypes = '', $params = array()) {
        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $query);
        if (!$stmt) {
            die('Error en la consulta preparada: ' . mysqli_error($this->conexion));
        }
        // Si se proporcionaron parámetros, vincularlos a la consulta
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        }
        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);
        if (!$resultado) {
            die('Error en la ejecución de la consulta preparada: ' . mysqli_stmt_error($stmt));
        }
        // Obtener el número de filas afectadas
        $filasAfectadas = mysqli_stmt_affected_rows($stmt);
        // Cerrar el statement
        mysqli_stmt_close($stmt);
        // Retornar el número de filas afectadas
        return $filasAfectadas;
    }
      

    public function InsertarDato($query, $paramTypes = '', $params = array()) {
        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $query);
        // Verificar si se pudo preparar la consulta
        if (!$stmt) {
            die('Error en la consulta preparada: ' . mysqli_error($this->conexion));
        }
        // Si se proporcionaron parámetros, vincularlos a la consulta
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        }
        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);
        if (!$resultado) {
            die('Error en la ejecución de la consulta preparada: ' . mysqli_stmt_error($stmt));
        }
        // Obtener el número de filas afectadas (opcional)
        $filasAfectadas = mysqli_stmt_affected_rows($stmt);
        // Cerrar el statement
        mysqli_stmt_close($stmt);
        // Retornar el número de filas afectadas
        return $filasAfectadas;
    }
    
    public function EliminarDato($query, $paramTypes = '', $params = array()) {
        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $query);
        // Verificar si se pudo preparar la consulta
        if (!$stmt) {
            die('Error en la consulta preparada: ' . mysqli_error($this->conexion));
        }
        // Si se proporcionaron parámetros, vincularlos a la consulta
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        }
        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);
        if (!$resultado) {
            die('Error en la ejecución de la consulta preparada: ' . mysqli_stmt_error($stmt));
        }
        // Obtener el número de filas afectadas (opcional)
        $filasAfectadas = mysqli_stmt_affected_rows($stmt);
        // Cerrar el statement
        mysqli_stmt_close($stmt);
        // Retornar el número de filas afectadas
        return $filasAfectadas;
    }
    
/**
 * En otras palabras:
 * La primera inserción (pedido) devuelve el ID del pedido.
 * Ese ID se usa para relacionar todos los productos que pertenecen a ese pedido.
 * Así logras la relación uno a muchos (un pedido → muchos productos).
*/

    public function InsertarDatoDoble($query, $paramTypes = '', $params = array()) {
        // Preparar la consulta
        $stmt = mysqli_prepare($this->conexion, $query);
        // Verificar si se pudo preparar la consulta
        if (!$stmt) {
            die('Error en la consulta preparada: ' . mysqli_error($this->conexion));
        }
        // Si se proporcionaron parámetros, vincularlos a la consulta
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
        }
        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);
        if (!$resultado) {
            die('Error en la ejecución de la consulta preparada: ' . mysqli_stmt_error($stmt));
        }
        // Obtener el ID del último dato insertado
        $ultimoIdInsertado = mysqli_insert_id($this->conexion);
        // Cerrar el statement
        mysqli_stmt_close($stmt);
        // Retornar el ID del último dato insertado
        return $ultimoIdInsertado;
    }
    
}
?>