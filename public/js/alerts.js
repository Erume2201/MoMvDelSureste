// Confirmación genérica con SweetAlert2
function confirmarAccion({ titulo = "¿Estás seguro?", texto = "", icono = "warning", 
    textoConfirmar = "Sí", textoCancelar = "Cancelar", callback}) {
    Swal.fire({
        title: titulo,
        text: texto,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: textoConfirmar,
        cancelButtonText: textoCancelar,
    }).then((result) => {
        if (result.isConfirmed && typeof callback === "function") {
            callback();
        }
    });
}

// ==========================
// ALERTAS REUTILIZABLES
// ==========================

// Alerta de éxito genérica
function alertaExito({ titulo = "¡Éxito!", texto = "", redirigir = null}) {
    Swal.fire({
        icon: "success",
        title: titulo,
        text: texto,
        confirmButtonText: "OK",
    }).then(() => {
        if (redirigir) {
            window.location.href = BASE_URL + redirigir;
        }
    });
}

// Alerta de error genérica
function alertaError({ titulo = "¡Error!", texto = ""}) {
    Swal.fire({
        icon: "error",
        title: titulo,
        text: texto,
        confirmButtonText: "OK"
    });
}

// Confirmación genérica
function confirmarAccion({
    titulo = "¿Estás seguro?",
    texto = "",
    icono = "warning",
    textoConfirmar = "Sí",
    textoCancelar = "Cancelar",
    callback,
}) {
    Swal.fire({
        title: titulo,
        text: texto,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: textoConfirmar,
        cancelButtonText: textoCancelar,
    }).then((result) => {
        if (result.isConfirmed && typeof callback === "function") {
            callback();
        }
    });
}

// ==========================
// USOS ESPECÍFICOS DEL SISTEMA
// ==========================

// Confirmación específica para cerrar sesión.
document.addEventListener("DOMContentLoaded", () => {
    const btnCerrarSesion = document.getElementById("btn-cerrar-sesion");

    if (btnCerrarSesion) {
        btnCerrarSesion.addEventListener("click", (e) => {
            e.preventDefault();
            confirmarAccion({
                titulo: "¿Deseas cerrar sesión?",
                texto: "Tu sesión actual se cerrará y volverás al inicio",
                icono: "warning",
                textoConfirmar: "Sí",
                textoCancelar: "Cancelar",
                callback: () => {
                    window.location.href = "index.php?module=cerrar_sesion";
                }
            });
        });
    }

    // Formulario: agregar cliente
    const formClientes = document.getElementById("form-clientes");

    if (formClientes) {
        formClientes.addEventListener("submit", function (e) {
            e.preventDefault();
            alertaExito({
                titulo: "Cliente agregado",
                texto: "El cliente se registró correctamente",
                redirigir: "index.php?module=clientes",
            });
        });
    }
});