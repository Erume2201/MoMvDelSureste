<?php
class SQL{ 
    public static function getEtiquetas(){
        return "SELECT * FROM etiqueta;";
    }
    public static function setNuevolibro(){
        return "INSERT INTO libros (id_libro, autor, titulo, tema, editorial, lugar, 
        año, serie, isbn, clasificacion, imagen, estatus, etiqueta_id) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    }
    public static function getCorreo(){
        return "SELECT * FROM usuarios
        WHERE usuarios.correo = ? AND usuarios.contraseña = ?";
    }
    public static function setUsuario(){
        return "INSERT INTO usuarios 
        (id_usuario, nombre, apellidos, correo, rol, contraseña, rfc, estatus, Genero) 
        VALUES (NULL,?,?,?,'user',?,?,'activo',?);";
    }

    public static function setUsuarioAdm(){
        return "INSERT INTO usuarios 
        (id_usuario, nombre, apellidos, correo, rol, contraseña, rfc, estatus, Genero) 
        VALUES (NULL,?,?,?,?,?,?,'activo',?);";
    }

    public static function busquedaPrestamosUsuario(){
        return "SELECT *
        FROM prestamo_hijo AS ph JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        JOIN libros AS lb ON ph.libros_id = lb.id_libro
        WHERE usuario_id = ?;";

    }

    public static function busquedaPrestamosAdmin(){
        return "SELECT *
        FROM prestamo_hijo AS ph JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        JOIN libros AS lb ON ph.libros_id = lb.id_libro
        JOIN etiqueta AS et on et.id_etiqueta = lb.etiqueta_id
        WHERE ph.estatus = 'Pendiente';";

    }

    public static function busquedaPrestado(){
        return "SELECT *
        FROM prestamo_hijo AS ph JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        JOIN libros AS lb ON ph.libros_id = lb.id_libro
        JOIN etiqueta AS et on et.id_etiqueta = lb.etiqueta_id
        WHERE ph.estatus = 'Prestado';";

    }

        public static function busquedabookVencidos(){
        return "SELECT *
        FROM prestamo_hijo AS ph JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        JOIN libros AS lb ON ph.libros_id = lb.id_libro
        JOIN etiqueta AS et on et.id_etiqueta = lb.etiqueta_id
        WHERE ph.estatus = 'Vencido';";

    }




    public static function getUsuarioExistente() {
        return "SELECT correo FROM usuarios WHERE correo = ?";
    }
    public static function getAllLibros(){
        return "SELECT *, (SELECT COUNT(*) FROM libros) AS numero_de_filas
        FROM libros
        LIMIT 15 OFFSET ?;";
    }
    public static function setNuevaEtq(){
        return "INSERT INTO etiqueta (id_etiqueta, area, acronimo) VALUES (NULL, ?, ?);";
    }


    public static function setNewSesionInit(){
        return "INSERT INTO inicio_sesion (id_inicio_sesion, inicio, fin, visualizacionlibros, usuario_id) VALUES (NULL, ?, ?, ?, ?)";
    }

    public static function setNewPass() {
        return "UPDATE usuarios SET contraseña = ? WHERE correo = ?;";
    }
    public static function getLibroID(){
        return "SELECT prestamo_hijo.id_prestamo_hijo, prestamos.fecha_entrega ,prestamo_hijo.fecha_devolucion,
        prestamo_hijo.estatus, usuarios.id_usuario , usuarios.nombre, usuarios.apellidos, usuarios.rfc, usuarios.correo ,libros.imagen,libros.autor,libros.isbn,libros.clasificacion,libros.editorial,
        libros.titulo,libros.tema,libros.año, libros.id_libro FROM prestamo_hijo
        JOIN tarjeta_dijital ON tarjeta_dijital.id_tarjeta_dijital= prestamo_hijo.tarjeta_dijital_id
        JOIN usuarios ON usuarios.id_usuario = tarjeta_dijital.usuario_id
        JOIN prestamos ON prestamos.id_prestamos = prestamo_hijo.prestamos_id
        JOIN libros ON libros.id_libro = prestamo_hijo.libros_id
        WHERE libros.id_libro=?;";
    }
    public static function setLibroSinprestamo(){
        return "SELECT autor, titulo, isbn, clasificacion, editorial, imagen FROM libros
        WHERE libros.id_libro=?;";
    }
    

    public static function getUsuariosAll() {
        return "SELECT *, (SELECT COUNT(*) FROM usuarios) AS numero_de_filas
        FROM usuarios
        LIMIT 15 OFFSET ?;";
    }
    public static function setEstatusUsuario() {
        return "UPDATE usuarios SET estatus = 'inactivo' WHERE correo = ?;";
    }
    public static function InsertarTarjeta(){
        return "INSERT INTO tarjeta_dijital (id_tarjeta_dijital, codigo_qr, usuario_id) 
        VALUES (NULL, ?, ?);";
    }
    public static function InsertarPrestamos(){
        return "INSERT INTO prestamos (id_prestamos, fecha_entrega, tar) 
        VALUES (NULL, ?,?);";
    }
    public static function InsertarPrestamosHijos(){
        return "INSERT INTO prestamo_hijo (id_prestamo_hijo, fecha_devolucion, estatus, 
        tarjeta_dijital_id, prestamos_id, libros_id) 
        VALUES (NULL, ?, ?, ?, ?, ?);";
    }
    public static function BusquedaBasicaSQl(){
        return "SELECT *,(SELECT COUNT(*) FROM libros  WHERE libros.titulo LIKE ? AND libros.tema LIKE ? AND libros.año LIKE ?
        AND libros.estatus=0 )AS numero_de_filas
        FROM libros
        WHERE libros.titulo LIKE ? AND libros.tema LIKE ? AND libros.año LIKE ?
        AND libros.estatus=0
        LIMIT 15 OFFSET ?;";
    }

    public static function setUpdate(){
        return "UPDATE usuarios 
        SET correo = ?, 
        contraseña = ?, 
        nombre = ?, 
        apellidos = ?,
        rfc = ?,
        Genero = ?,
        rol = ? 
        WHERE usuarios.correo = ?;";
    }
    public static function setUpdateEstatusPrestamos(){
        return "UPDATE prestamo_hijo 
        SET fecha_devolucion = ?, 
        estatus = 'Prestado' 
        WHERE id_prestamo_hijo = ?;";
    }


    public static function setRechazarSolicitud(){
        return "UPDATE prestamo_hijo 
        SET estatus = 'Rechazado' 
        WHERE id_prestamo_hijo = ?;";
    }

    public static function setDevolverL(){
        return "UPDATE prestamo_hijo 
        SET estatus = 'Activo' 
        WHERE id_prestamo_hijo = ?;";
    }

        public static function setEstatusVencido(){
        return "UPDATE prestamo_hijo
        SET estatus = 'Vencido'
        WHERE fecha_devolucion < CURDATE() AND estatus='Prestado'";
    }

    public static function setUpdatePrestamoPadre(){
        return "UPDATE prestamos 
        SET fecha_entrega = ?  
        WHERE id_prestamos = ?;";
    }

    public static function setUpdateSinPass(){
        return "UPDATE usuarios 
        SET correo = ?, 
        nombre = ?, 
        apellidos = ?,
        rfc = ?,
        Genero = ?,
        rol = ? 
        WHERE usuarios.correo = ?;";
    }
    public static function getBusquedaAvanzada(){
        return "SELECT *,(SELECT  COUNT(*) FROM libros WHERE libros.autor LIKE ? AND libros.titulo LIKE ? AND libros.tema LIKE ?
        AND libros.editorial LIKE ? AND libros.lugar LIKE ? AND libros.año LIKE ?
        AND libros.serie LIKE ? AND libros.isbn LIKE ? AND libros.clasificacion LIKE ?
        AND libros.estatus=0)AS numero_de_filas
        FROM libros
        WHERE libros.autor LIKE ? AND libros.titulo LIKE ? AND libros.tema LIKE ?
        AND libros.editorial LIKE ? AND libros.lugar LIKE ? AND libros.año LIKE ?
        AND libros.serie LIKE ? AND libros.isbn LIKE ? AND libros.clasificacion LIKE ?
        AND libros.estatus=0
        LIMIT 15 OFFSET ?;";
    }
    public static function getMultiCampo($columna){
        return "SELECT * ,(SELECT COUNT(*) FROM libros WHERE $columna LIKE ?)AS numero_de_filas FROM libros 
        WHERE $columna LIKE ?;";
    }
    public static function getDatoscompletos(){
        return "SELECT * FROM libros
        JOIN etiqueta ON etiqueta.id_etiqueta = libros.etiqueta_id
        WHERE id_libro=?;";
    }
    public static function ActualizarLibroBD(){
        return "UPDATE libros SET autor = ?, titulo = ?, tema = ?, editorial = ?,
         lugar = ?, año = ?, serie = ?, isbn = ?, clasificacion = ?, imagen = ?, 
         estatus = ?, etiqueta_id = ? WHERE libros.id_libro = ?;";
    }
    /**
     * funciones para estadisticas
     */

     public static function atencionUsuario(){
        return "SELECT 
        us.Genero,
        COUNT(us.id_usuario) AS cantidad_usuarios_atendidos
    FROM 
        prestamo_hijo AS ph 
        JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre on pre.id_prestamos = ph.prestamos_id
    WHERE 
       (ph.estatus = 'Prestado' OR ph.estatus = 'Activo')
        AND MONTH(pre.fecha_entrega) = ?
    GROUP BY
        us.Genero;";
        
    }

    public static function ultimosInicioSesion(){
        return "SELECT 
        us.id_usuario,
        us.nombre,
        us.correo,
        ins.inicio,
        ins.fin,
        TIMEDIFF(ins.fin, ins.inicio) AS tiempo_conectado
    FROM 
        inicio_sesion AS ins
        JOIN usuarios AS us ON us.id_usuario = ins.usuario_id
    ORDER BY
        ins.id_inicio_sesion DESC
    LIMIT 5;";
        
    }


    public static function graficacionDatos() {
        return "SELECT 
        COUNT(DISTINCT ph.id_prestamo_hijo) AS librosPrestado,
        SUM(ins.visualizacionlibros) AS totalVisualizacionLibros,
        COUNT(DISTINCT ins.id_inicio_sesion) AS totalIniciosSesion
    FROM 
        prestamo_hijo AS ph 
        JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
        JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
        JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        LEFT JOIN inicio_sesion AS ins ON ins.usuario_id = us.id_usuario
    WHERE 
        (ph.estatus = 'Prestado' OR ph.estatus = 'Activo')
        AND MONTH(pre.fecha_entrega) = ?;";
        
    }


    public static function graficacion2() {
        return "SELECT 
        SUM(ins.visualizacionlibros) AS totalVisualizacionLibros,
        COUNT(DISTINCT ins.id_inicio_sesion) AS totalIniciosSesion
    FROM 
        inicio_sesion AS ins 
    WHERE 
       MONTH(ins.inicio) = ?;";
    }



    public static function consultaExcell() {
        return "SELECT
        SUM(ins.visualizacionlibros) AS Visualizacion_Libros,
        COUNT(DISTINCT ins.id_inicio_sesion) AS numero_Visitas,
        ( SELECT 
            COUNT(us.id_usuario)
        FROM 
            prestamo_hijo AS ph 
            JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
            JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
            JOIN prestamos AS pre on pre.id_prestamos = ph.prestamos_id
        WHERE 
           (ph.estatus = 'Prestado' OR ph.estatus = 'Activo')
            AND MONTH(pre.fecha_entrega) = ? AND us.Genero='femenino'
        GROUP BY
            us.Genero
        ) AS Atencion_Femenino,
        (
           SELECT 
           
            COUNT(us.id_usuario)
        FROM 
            prestamo_hijo AS ph 
            JOIN tarjeta_dijital AS tj ON tj.id_tarjeta_dijital = ph.tarjeta_dijital_id
            JOIN usuarios AS us ON us.id_usuario = tj.usuario_id
            JOIN prestamos AS pre ON pre.id_prestamos = ph.prestamos_id
        WHERE 
           (ph.estatus = 'Prestado' OR ph.estatus = 'Activo')
            AND MONTH(pre.fecha_entrega) = ? AND us.Genero='masculino'
        GROUP BY
            us.Genero
        ) AS Atencion_Masculino
    FROM
        prestamo_hijo AS preH
        JOIN tarjeta_dijital AS tar ON preH.tarjeta_dijital_id = tar.id_tarjeta_dijital
        JOIN usuarios AS us ON us.id_usuario = tar.usuario_id
        JOIN inicio_sesion AS ins ON ins.usuario_id = us.id_usuario
        JOIN libros AS li ON li.id_libro = preH.libros_id
        JOIN prestamos AS pre ON pre.id_prestamos = preH.prestamos_id
        WHERE 
            MONTH(pre.fecha_entrega) = ?;";
    }



    
}
?>