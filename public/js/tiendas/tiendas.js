
// Buscador de la tabla tiendas
document.addEventListener("DOMContentLoaded", function () {
    const inputBuscar = document.getElementById("buscar-tienda");
    const tabla = document.getElementById("tiendas-table");
    const filas = document.getElementsByTagName("tr");
    const mensaje = document.createElement("tr");

    // Fila para "sin resultados"
    mensaje.innerHTML = `<td colspan="8" style="text-align:center; color:red; font-size:18px;">No se encontraron resultados 😥</td>`;
    mensaje.style.display = "none";
    tabla.appendChild(mensaje);

    inputBuscar.addEventListener("keyup", function() {
        const filtro = inputBuscar.value.toLowerCase();
        let coincidencias = 0;

        for (let i = 1; i < filas.length; i++) { // Empieza en 1 para saltar encabezados
            let fila = filas[i];
            let textoFila = fila.textContent.toLowerCase();

            if (textoFila.includes(filtro)) {
                fila.style.display = "";
                coincidencias++;
            } else {
                fila.style.display = "none";
            }       
        }

        // Mostrar mensaje si no hubo coincidencias
        if (coincidencias === 0) {
            mensaje.style.display = "";
        } else {
            mensaje.style.display = "none";
        }
    });
});