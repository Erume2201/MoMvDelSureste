$(document).ready(function () {
    const correo = document.getElementById('exampleFormControlEmail1');
    const pass = document.getElementById('password');
    const buscar = document.getElementById('iniciar_sesion');
    const form = document.getElementById('my-form');

    buscar.addEventListener("click", (event) => {
        event.preventDefault(); // 👈 Esto evita que el formulario se envíe
        console.log("hola mundo");

        // Aquí puedes hacer tus validaciones o lógica de envío con AJAX si quieres
    });
});

