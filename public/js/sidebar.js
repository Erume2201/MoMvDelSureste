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

    // Resaltar módulo actual
    const urlParams = new URLSearchParams(window.location.search);
    const currentModule = urlParams.get("module");

    // Mapeo manual de módulos hijos a su módulo padre
    const moduleMap = {
        "clientes_add" : "clientes",
        "tiendas_add" : "tiendas",
        "operadores_add" : "operadores",
        "unidades_add" : "unidades",
        "usuarios_add" : "usuarios",
        "contratos_add" : "contratos",
        "contratos_ver" : "contratos_ver"
    };

    const moduleToActivate = moduleMap[currentModule] || currentModule;

    if (moduleToActivate) {
        // Buscar enlace que apunte a este módulo
        const activeLink = sidebar.querySelector(`a[href*="module=${moduleToActivate}"]`);
        if (activeLink) {
            activeLink.classList.add("active"); // Para el estilo destacado

            // Si es parte de un submenú, abrir ese submenú.
            const submenu = activeLink.closest(".submenu");
            if (submenu) {
                submenu.classList.add("submenu-visible");
                const arrow = submenu.previousElementSibling.querySelector(".arrow");
                if(arrow) arrow.classList.add("rotated");
            }
        }
    }
});