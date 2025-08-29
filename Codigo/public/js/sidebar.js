// sidebar.js - Versión con acordeón
document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll(".submenu-toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", (e) => {
            e.preventDefault();

            const submenu = toggle.nextElementSibling;
            const isVisible = submenu.classList.contains("submenu-visible");

            // Cerrar todos los submenús antes de abrir el seleccionado
            document.querySelectorAll(".submenu").forEach(sub => {
                sub.classList.remove("submenu-visible");
                const arrow = sub.previousElementSibling.querySelector(".arrow");
                if (arrow) arrow.classList.remove("rotate");
            });

            // Si el submenu no estaba visible, abrirlo
            if (!isVisible) {
                submenu.classList.add("submenu-visible");
                const arrow = toggle.querySelector(".arrow");
                if (arrow) arrow.classList.add("rotate");
            }
        });
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
