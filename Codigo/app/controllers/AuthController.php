<?php
require_once 'app/models/UsuarioModel.php';

class AuthController {
    public function login() {
      //  session_start();
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        $_SESSION['usuario'] = "usuario1";
            header("Location: index.php");

  //      $usuarioModel = new UsuarioModel();
    //    $user = $usuarioModel->verificarUsuario($usuario, $password);

  /*      if ($user) {
            $_SESSION['usuario'] = $user['usuario'];
            header("Location: index.php");
        } else {
            $_SESSION['error'] = "Usuario o contraseña incorrectos";
            header("Location: login.php");
        }*/
    }

  
}
