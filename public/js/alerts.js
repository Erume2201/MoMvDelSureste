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

// ==========================
// ALERTAS SEGÚN URL PARAMS
// ==========================

document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("msg")) {
        const msg = urlParams.get("msg");

        switch (msg) {
            case "cliente_agregado":
                alertaExito({titulo: "Cliente agregado", texto:"El cliente se registró correctamente."});
                break;
            case "tienda_agregada":
                alertaExito({titulo: "Tienda agregada", texto:"La tienda se registró correctamente."});
                break;
            case "operador_agregado":
                alertaExito({titulo: "Operador agregado", texto:"El operador se registró correctamente."});
                break;
            case "unidad_agregada":
                alertaExito({titulo: "Unidad agregada", texto:"La unidad se registró correctamente."});
                break;
            case "usuario_agregado":
                alertaExito({titulo: "Usuario agregado", texto:"El usuario se registró correctamente."});
            break;
        }
    }

    if (urlParams.has("error")) {
        alertaError({
            titulo: "Error",
            texto: urlParams.get("error"),
        });
    }
});

// ==========================
// CONFIRMACIÓN CERRAR SESIÓN
// ==========================
document.addEventListener("DOMContentLoaded", () => {
    const btnCerrarSesion = document.getElementById("btn-cerrar-sesion");

    if (btnCerrarSesion) {
        btnCerrarSesion.addEventListener("click", (e) => {
            e.preventDefault();
            Swal.fire({
                title: "¿Deseas cerrar sesión?",
                text: "Tu sesión actual se cerrará y volverás al inicio",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php?module=cerrar_sesion";
                }
            });
        });
    }
});

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

// helpers para sweetalert2 (usar junto a la función confirmarAccion ya existente)
// Toast compacto (top-right)
function showToast(message, icon = 'success', timer = 1500) {
    if (typeof Swal === 'undefined') {
        alert(message); // fallback simple
        return;
    }
    Swal.fire({
        toast:true,
        position: 'top-end',
        icon: icon,
        title: message,
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true
    });
}

// Modal de alerta (error/aviso)
function showAlert(title = 'Atención', text = '', icon = 'error') {
    if (typeof Swal === 'undefined') {
        alert(title + (text ? '\n\n' + text : ''));
        return;
    }
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: 'OK'
    });
}