<?php 
require_once __DIR__ . '/../config/config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
</head>

    
<body class="d-flex justify-content-center align-items-center min-vh-100" 
      style="background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5, #e3f2fd);">

    <form id="my-form" class="w-100" style="max-width: 420px;">
        <div class="p-4 p-md-5 shadow-lg rounded bg-white text-center">

            <!-- Logo arriba -->
            <img src="<?php echo BASE_URL; ?>public/img/LOGO_MV_transparente.png" alt="Logo MV" 
                class="img-fluid mb-3" style="max-width:180px;">

            <h2 class="text-primary fw-bold mb-4">MO.MV DEL SURESTE</h2>

            <!-- Input de correo electrónico -->
            <div class="mb-3 text-start">
                <label for="exampleFormControlEmail1" class="form-label fw-bold">Correo</label>
                <input type="email" class="form-control" id="exampleFormControlEmail1" 
                       name="correo" placeholder="correo@ejemplo.com" maxlength="45" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-bold">Contraseña</label>
                <input class="form-control" type="password" maxlength="45"
                    placeholder="Ingresa tu contraseña" name="password" id="password" required/>
                <div class="mt-2">
                    <a href="#" id="forgotPassword"
                    class="form-text text-decoration-none fw-bold text-primary">¿Has olvidado tu contraseña?
                    </a>
                </div>
            </div>

            <!-- Botón Login -->
            <button id="iniciar_sesion" type="button" 
                    class="btn btn-primary w-100 mb-3 shadow-sm">
                Iniciar sesión
            </button>

            <!-- Enlace para crear una cuenta -->
            <small class="d-block">
                ¿Ya tienes una cotización? 
                <a href="#" class="fw-bold text-primary text-decoration-none">Búscala ahora</a>
            </small>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/controllers/js/iniciarSesion.js"></script>
</body>



</html>
