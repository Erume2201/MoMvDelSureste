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
});