$(document).ready(function () {
    const nombreUsuario   = $('#nombre_usuario');
    const apellidos       = $('#apellidos_usuario');
    const rfcUsuario      = $('#rfc_usuario');
    const correoUsuario   = $('#email_usuario');
    const claveUsuario    = $('#contraseña_usuario');
    const rolUsuario      = $('#rol_usuario');
    const formulario      = $('#form-usuarios'); 
    const btnCancelar     = $('#btn-cancelar');

    // Manejo de envío del formulario
    formulario.on('submit', function (e) {
        e.preventDefault();

        if (!nombreUsuario.val() || !apellidos.val() || !rfcUsuario.val() || !correoUsuario.val() || !claveUsuario.val() || !rolUsuario.val()) {
            alert('Por favor, completa todos los campos.');
            return;
        }

        const datosFormulario = {
            nombre: nombreUsuario.val(),
            apellidos: apellidos.val(),
            rfc: rfcUsuario.val(),
            correo: correoUsuario.val(),
            clave: claveUsuario.val(),
            rol: (rolUsuario.val() ? rolUsuario.val().toLowerCase() : "operador")
        };

        $.ajax({
            url: 'app/controllers/php/addUser/addUser.php',
            type: 'POST',
            dataType: 'json',
            data: datosFormulario,
            timeout: 10000 
        })
        .done(function (respuesta) {
            if (respuesta && respuesta.success === true) {
                alert(respuesta.mensaje);
                formulario[0].reset();
                window.location.href = 'index.php?module=usuarios';
            } else {
                alert(respuesta.error);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Error AJAX:', textStatus, errorThrown);
            alert('No se pudo conectar con el servidor. Intenta de nuevo.');
        });
    });

    // Manejo del botón cancelar
    btnCancelar.on('click', function () {
        if (confirm("¿Estás seguro que deseas cancelar? Se perderán los cambios.")) {
            window.location.href = "index.php?module=usuarios"; 
        }
    });
});

