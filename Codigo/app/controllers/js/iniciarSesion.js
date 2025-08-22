$(document).ready(function () {
    const form = document.getElementById('my-form');
    const correo = document.getElementById('exampleFormControlEmail1');
    const pass = document.getElementById('password');
    const iniciarBtn = document.getElementById('iniciar_sesion');

    // Listener del submit del formulario
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // evita el envío real
        console.log("Formulario capturado ✅");
        console.log("Correo:", correo.value);
        console.log("Contraseña:", pass.value);

        // Aquí puedes agregar tu AJAX
        /*
        $.ajax({
            url: "../controllers/AuthController.php",
            type: "POST",
            data: {
                correo: correo.value,
                pass: pass.value,
            },
            success: function(response) {
                console.log("Respuesta del servidor:", response);
            }
        });
        */
    });

    // Listener del click del botón tipo "button"
    iniciarBtn.addEventListener("click", function() {
        // dispara el evento submit del formulario manualmente
        form.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
    });
});



