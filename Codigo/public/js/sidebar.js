// sidebar.js - Versión con acordeón
document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll(".submenu-toggle");
    const hamburger = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.createElement("div");

    // Configurar overlay
    overlay.classList.add("sidebar-overlay");
    document.body.appendChild(overlay);

    // Submenús con acordeón
    toggles.forEach(toggle => {
        toggle.addEventListener("click", (e) => {
            e.preventDefault();

            const submenu = toggle.nextElementSibling;
            const isVisible = submenu.classList.contains("submenu-visible");

            // Cerrar todos los submenús antes de abrir el seleccionado
            document.querySelectorAll(".submenu").forEach(sub => {
                sub.classList.remove("submenu-visible");
                const arrow = sub.previousElementSibling.querySelector(".arrow");
                if (arrow) arrow.classList.remove("rotated");
            });

            // Si el submenu no estaba visible, abrirlo
            if (!isVisible) {
                submenu.classList.add("submenu-visible");
                const arrow = toggle.querySelector(".arrow");
                if (arrow) arrow.classList.add("rotated");
            }
        });
    });

    // Menú hamburguesa
    hamburger.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
    });

    // Cerrar sidebar al hacer click en overlay
    overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });
});

// ----------------------------------------------//

// Sidebar con submenús despegables. Sin acordeón
// document.addEventListener('DOMContentLoaded', () => {
//     const toggles = document.querySelectorAll('.submenu-toggle');

//     toggles.forEach(toggle => {
//         toggle.addEventListener('click', (e) => {
//             e.preventDefault();

//             // Encontrar el submenú asociado
//             const submenu = toggle.nextElementSibling;

//             // Alternar clase visible
//             submenu.classList.toggle('submenu-visible');

//             // Rotar la flecha
//             const arrow = toggle.querySelector('.arrow');
//             if (arrow) {
//                 arrow.classList.toggle('rotated');
//             }
//         });
//     });
// });
