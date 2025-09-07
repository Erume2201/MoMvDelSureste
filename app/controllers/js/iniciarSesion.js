$(document).ready(function () {
    var correo1 = document.getElementById('exampleFormControlEmail1');
    var pass = document.getElementById('password');
    var iniciarS = document.getElementById('iniciar_sesion');
    var form = document.getElementById('my-form');

       /**
     * Estructura del submit
     */
    $(form).submit(function (event) {
        event.preventDefault(); // Evita el envío del formulario si los campos están vacíos
    });

    /**
     * EVITAR ENVIAR CON Enter
     */
    // Maneja la pulsación de "Enter" en el campo de contraseña
    form.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Evitar el envío del formulario
        }
    });

    if (iniciarS != null) {
        iniciarS.addEventListener("click", function () {
           var actionURL = 'index.php?module=iniciar_sesion';
            window.location.href = actionURL;
        });
    }



});



