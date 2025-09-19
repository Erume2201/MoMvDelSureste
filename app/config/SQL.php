<?php
class SQL{
     public static function getUsuario(){
        return "SELECT id_usuario, nombre, contrasena_hash, rol 
        FROM usuarios WHERE email = ?";
     }   
     public static function setUser(){
    return "INSERT INTO usuarios (id_usuario, nombre, apellidos, rfc, email, contrasena_hash, rol) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?);";
}
public static function getRfcGmail(){
    return "SELECT COUNT(*) AS total FROM usuarios WHERE email = ? OR rfc = ?";
}
   }
?>