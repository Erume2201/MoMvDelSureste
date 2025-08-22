$(document).ready(function () {
    const form = document.getElementById('my-form');
    const correo = document.getElementById('exampleFormControlEmail1');
    const pass = document.getElementById('password');

    // Escuchamos el "submit" del formulario, no el click del botón
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // 👈 evita que el form se envíe por defecto
        console.log("Formulario capturado ✅");
        console.log("Correo:", correo.value);
        console.log("Pass:", pass.value);

        // Aquí va tu AJAX
        /*
        $.ajax({
            url: "../controllers/AuthController.php",
            type: "POST",
            data: {
                correo: correo.value,
                pass: pass.value,
            },
            success: function(response) {
                console.log("Respuesta:", response);
            }
        });
        */
    });
});


