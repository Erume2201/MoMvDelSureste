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

    <form id="my-form" class="w-100" style="max-width: 500px;">
        <div class="px-lg-5 py-lg-4 p-4 shadow-lg rounded bg-white text-center" 
             style="background-color: rgba(255,255,255,0.9);">

            <!-- Logo arriba -->
            <img src="public/img/LOGO_MV_transparente.png" alt="Logo MV" 
                 style="width:200px; height:auto; margin-bottom:5px;">

            <h2 class="text-center mb-4 text-primary fw-bold">MO.MV DEL SURESTE</h2>

            <!-- Input de correo electrónico -->
            <div class="mb-4 text-start">
                <label for="exampleFormControlEmail1" class="form-label fw-bold">Correo</label>
                <input type="email" class="form-control" id="exampleFormControlEmail1" 
                       name="correo" placeholder="correo@ejemplo.com" maxlength="45" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-4 text-start">
                <label for="password" class="form-label fw-bold">Contraseña</label>
                <div class="input-group mt-1 mb-4">
                    <input class="form-control" type="password" maxlength="45"
                           placeholder="Ingresa tu contraseña" name="password" id="password" required />
                </div>
                <a href="#" id="forgotPassword"
                   class="form-text text-decoration-none fw-bold text-primary">¿Has olvidado tu contraseña?</a>
            </div>

            <button id="iniciar_sesion" type="button" 
                    class="btn btn-primary w-100 mb-3 shadow-sm">
                Iniciar sesión
            </button>

            <!-- Enlace para crear una cuenta -->
            <div class="text-center">
                <p class="mb-1">¿Ya tienes una cotización?</p>
                <a href="#" class="text-primary fw-bold text-decoration-none">Buscala ahora</a>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app/controllers/js/iniciarSesion.js"></script>
</body>



</html>
