$(document).ready(function () {
    // Almacena referencias a los elementos del DOM para un acceso más rápido y eficiente.
    const correoInput = document.getElementById('exampleFormControlEmail1');
    const passInput = document.getElementById('password');
    const iniciarS = document.getElementById('iniciar_sesion');
    const form = document.getElementById('my-form');

    /**
     * @function handleLogin
     * @description Maneja la lógica para el inicio de sesión.
     * Recoge los datos del formulario, valida que no estén vacíos y
     * envía una solicitud AJAX al servidor para la autenticación.
     */
    function handleLogin() {
        // Verifica que ambos campos tengan contenido.
        if (correoInput.value !== '' && passInput.value !== '') {
            // Realiza una solicitud AJAX de tipo POST.
            $.ajax({
                url: "app/controllers/php/validarInicio.php",
                // Tipo de solicitud HTTP.
                type: "POST",
                data: {
                    correo1: correoInput.value,
                    pass2: passInput.value,
                    dataType: "json",
                },
                // Función que se ejecuta si la solicitud se completa con éxito.
                success: function(Response) {
                        let datos = JSON.parse(Response);
                        console.log(datos);
                        if (datos.success === true) {
                            // Si el inicio de sesión fue exitoso, redirige al usuario al panel de control.
                            window.location.href = 'index.php?module=iniciar_sesion';
                        } else {
                            // Si 'success' es falso, muestra el mensaje de error del servidor.
                            alert(datos.message);
                        }
                },
                // Función que se ejecuta si la solicitud AJAX falla (ej. error de red).
                error: function() {
                    alert('Error de conexión con el servidor.');
                }
            });
        } else {
            // Si los campos están vacíos, muestra una alerta al usuario.
            alert('Por favor, ingresa tu correo electrónico y contraseña.');
        }
       

    }

    // Previene el envío del formulario cuando se presiona la tecla 'Enter'.
    if (form) {
        form.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Detiene el comportamiento predeterminado del formulario.
                handleLogin(); // Llama a la función de inicio de sesión.
            }
        });
    }

    // Escucha el evento 'click' en el botón de inicio de sesión.
    if (iniciarS) {
        iniciarS.addEventListener("click", function () {
            handleLogin(); // Llama a la función de inicio de sesión.
        });
    }
});



