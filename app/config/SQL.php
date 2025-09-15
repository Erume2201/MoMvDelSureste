<?php
class SQL{
     public static function getUsuario(){
        return "SELECT id_usuario, nombre, contrasena_hash, rol 
        FROM usuarios WHERE email = ?";
     }
     
}
?>