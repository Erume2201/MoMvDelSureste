<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

    
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <form id="my-form" method="POST" action="#" class="w-100" style="max-width: 400px;">
        <div class="px-lg-5 py-lg-4 p-4 shadow rounded bg-white">
            <h2 class="text-center mb-4">Empresa fantasma</h2>

            <!-- Input de correo electrónico -->
            <div class="mb-4">
                <label for="exampleFormControlEmail1" class="form-label fw-bold">Correo</label>
                <input type="email" class="form-control" id="exampleFormControlEmail1" 
                       name="correo" placeholder="correo@ejemplo.com" maxlength="45" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-4">
                <label for="password" class="form-label fw-bold">Contraseña</label>
                <div class="input-group mt-1 mb-4">
                    <input class="form-control" type="password" maxlength="45"
                           placeholder="Ingresa tu contraseña" name="password" id="password" required />
                  <!--  <div class="input-group-text">
                        <img onclick="verPass()" src="assets/img/login/eye-slash.svg" 
                             alt="password-icon" style="height: 2rem" id="icon-contrasena" />
                    </div> -->
                </div>
                <a href="#" id="forgotPassword"
                   class="form-text text-decoration-none fw-bold">¿Has olvidado tu contraseña?</a>
            </div>

                <!-- Botón de inicio de sesión -->
            <button type="button" class="btn btn-primary w-100 mb-3" id="iniciar_sesion">
        Iniciar sesión
    </button>



            <!-- Enlace para crear una cuenta -->
            <div class="text-center">
                <p class="mb-1">¿Todavía no tienes una cuenta?</p>
                <a href="#"
                   class="text-primary fw-bold text-decoration-none">Crea una ahora</a>
            </div>
        </div>
    </form>


   <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
 <script src="../controllers/js/iniciarSesion.js"></script>

</body>


</html>
