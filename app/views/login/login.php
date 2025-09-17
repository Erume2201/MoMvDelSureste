<?php 
require_once __DIR__ . '/../../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico" type="image/x-icon">
    <!-- Estilos propios -->
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
</head>

<body>
    <div class="login-split">

        <!-- Lado izquierdo: formulario -->
        <div class="login-left">
            <form id="my-form" class="w-100">

                <div class="p-4 p-md-5 shadow-lg text-center">

                    <h1 class="iniciar-sesion">INICIAR SESION</h1>
                    <!-- <h2 class="text-primary fw-bold">MO.MV DEL SURESTE</h2> -->

                    <!-- Input de correo electrónico -->
                    <div class="mb-3 text-start">
                        <label for="exampleFormControlEmail1" class="form-label fw-bold">Correo</label>
                        <input type="email" class="form-control" id="exampleFormControlEmail1" 
                            name="correo" placeholder="juanito123@gmail.com" maxlength="45" required>
                    </div>

                    <!-- Campo de contraseña -->
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <input class="form-control" type="password" maxlength="45"
                            placeholder="Escribe tu contraseña..." name="password" id="password" required>

                        <!-- Restablecer contraseña -->
                        <div class="mt-2">
                            <a href="#" id="forgotPassword"
                            class="form-text text-decoration-none">
                            ¿Has olvidado tu contraseña?
                            </a>
                        </div>
                    </div>

                    <!-- Botón Login -->
                    <button id="iniciar_sesion" type="button" 
                            class="btn w-100 mb-3 shadow-sm">
                        Ingresar
                    </button>

                    <!-- Enlace para crear una cuenta -->
                    <small class="d-block">
                        ¿Ya tienes una cotización? 
                        <a href="index.php?module=firmar_cotizacion" class="text-decoration-none" id="enlace-cotizacion">
                            Búscala ahora
                        </a>
                    </small>
                </div>
            </form>
        </div>

        <!-- Lado derecho: panel transparente con logo superpuesto -->
        <aside class="login-right">
            <!-- Este logo permanece centrado sobre el fondo -->
            <img src="<?php echo BASE_URL; ?>public/img/logo_mv_blanco.png" alt="logo_blanco" class="logomv-illustration">
        </aside>
    </div>

    <!-- === SCRIPTS === -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tus helpers de alertas (contiene showAlert, showToast y confirmarAccion) -->
    <script src="<?php echo BASE_URL; ?>public/js/alerts.js"></script>
    <!-- Script de login -->
    <script src="<?php echo BASE_URL; ?>app/controllers/js/iniciarSesion.js"></script>
</body>
</html>
