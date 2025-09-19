
// iniciarSesion.js
$(document).ready(function () {
    // Almacena referencias a los elementos del DOM para un acceso más rápido y eficiente.
    const correoInput = $('#exampleFormControlEmail1');
    const passInput = $('#password');
    const iniciarBtn = $('#iniciar_sesion');
    const form = $('#my-form');

    // Validación de formato email
    function validarEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    // Manejar el login
    /**
     * @function handleLogin
     * @description Maneja la lógica para el inicio de sesión.
     * Recoge los datos del formulario, valida que no estén vacíos y
     * envía una solicitud AJAX al servidor para la autenticación.
     */
    function handleLogin() {
        const correo = correoInput.val().trim();
        const pass = passInput.val();

        // Validaciones de front
        if (!correo && !pass) {
            showAlert('Campos vacíos', 'Por favor, ingresa tu correo y contraseña.', 'warning');
            correoInput.focus();
            return
        }
        if (!correo) {
            showAlert('Correo requerido', 'Por favor, ingresa tu correo electrónico.', 'warning');
            correoInput.focus();
            return
        }
        if (!validarEmail(correo)) {
            showAlert('Correo inválido', 'El correo no tiene un formato válido.', 'error');
            correoInput.focus();
            return
        }
        if (!pass) {
            showAlert('Contraseña requerida', 'Por favor, ingresa tu contraseña.', 'warning');
            passInput.focus();
            return
        }

        // Desactivar botón para evitar doble envío
        iniciarBtn.prop('disabled', true);

        $.ajax({
            url: "app/controllers/php/validarInicio/validarInicio.php",
            type: "POST",
            dataType: "json", // Le pide a jQuery que parseé la respuesta JSON
            data: {
                correo1: correo,
                pass2: pass                
            },
            timeout: 10000 // 10s
        })
        .done(function (response) {
            // response ya es objeto JS (no JSON.parse)
            if (response && response.success === true) {
                // Mensaje de bienvenida con toast y luego redireccionar
                const nombre = response.usuario && response.usuario.nombre ? response.usuario.nombre : '';
                showToast(`Bienvenido${nombre ? ', ' + nombre : ''}!`, 'success', 1800);
                setTimeout(function() {
                    // Redirigir al dashboard
                    window.location.href = 'index.php?module=iniciar_sesion';
                }, 1400);
            } else {
                // Mensaje genérico (no revelamos si correo o contraseña)
                const msg = response && response.message ? response.message : 'Credenciales inválidas.';
                showAlert('Error de autenticación', msg, 'error');
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Mostrar mensaje amigable y opcionalmente log del error en consola
            console.error('AJAX error', textStatus, errorThrown, jqXHR.responseText);
            showAlert('Error', 'No se pudo conectar con el servidor. Intenta de nuevo.', 'error');
        })
        .always(function() {
            iniciarBtn.prop('disabled', false);
        });
    }

    // Evitar submit con Enter default del formulario
    form.on('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            handleLogin();
        }
    });

    // Click en el botón
    iniciarBtn.on('click', function (){
        handleLogin();
    });
});