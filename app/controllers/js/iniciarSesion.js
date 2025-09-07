$(document).ready(function () {
    // Referencias a los elementos del formulario
    const correoInput = document.getElementById('exampleFormControlEmail1');
    const iniciarS = document.getElementById('iniciar_sesion');
    const form = document.getElementById('my-form');

    // Función para manejar el inicio de sesión
    function handleLogin() {
        const correo = correoInput.value;

        if (correo.trim() !== '') {
            // Codifica el correo para que sea seguro en la URL
            const actionURL = 'index.php?module=iniciar_sesion&correo1=' + encodeURIComponent(correo);
            window.location.href = actionURL;
        } else {
            // Muestra un mensaje si el campo está vacío
            alert('Por favor, ingresa tu correo electrónico.');
        }
    }

    // Evita el envío del formulario al presionar Enter en cualquier campo del formulario
    if (form) {
        form.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Previene el envío por defecto
                handleLogin(); // Llama a la función de inicio de sesión
            }
        });
    }

    // Maneja el clic en el botón de inicio de sesión
    if (iniciarS) {
        iniciarS.addEventListener("click", function () {
            handleLogin(); // Llama a la función de inicio de sesión
        });
    }
});



