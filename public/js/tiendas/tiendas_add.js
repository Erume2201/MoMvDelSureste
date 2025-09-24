// Script para el buscador del formulario de agregar tiendas

document.addEventListener('DOMContentLoaded', function() {
    const buscarClienteInput = document.getElementById('buscar_cliente');
    const resultadosBusquedaDiv = document.getElementById('resultados_busqueda');
    const idClienteHiddenInput = document.getElementById('id_cliente');

    // Función para limpiar los resultados y el campo oculto
    function limpiarResultados() {
        resultadosBusquedaDiv.innerHTML = '';
        resultadosBusquedaDiv.style.display = 'none';
    }

    // Escuchar la escritura en el campo de búsqueda
    buscarClienteInput.addEventListener('input', function() {
        const searchTerm = this.value.trim();
        
        // Si el término de búsqueda está vacío, limpiar resultados
        if (searchTerm.length === 0) {
            limpiarResultados();
            return;
        }

        // Realizar la petición AJAX
        fetch(`${BASE_URL}app/controllers/php/addTiendas/get_clientes.php?term=${searchTerm}`)
            .then(response => response.json())
            .then(data => {
                limpiarResultados();
                
                // Si se encontraron clientes, mostrarlos
                if (data.length > 0) {
                    resultadosBusquedaDiv.style.display = 'block';
                    data.forEach(cliente => {
                        const div = document.createElement('div');
                        div.classList.add('resultado-item');
                        div.textContent = cliente.nombre_cliente;
                        div.dataset.idCliente = cliente.id_cliente;
                        
                        // Manejar el clic en un resultado
                        div.addEventListener('click', function() {
                            buscarClienteInput.value = this.textContent;
                            idClienteHiddenInput.value = this.dataset.idCliente;
                            limpiarResultados();
                        });
                        
                        resultadosBusquedaDiv.appendChild(div);
                    });
                }
            })
            .catch(error => {
                console.error('Error al obtener clientes:', error);
                limpiarResultados();
            });
    });

    // Ocultar resultados si se hace clic fuera del buscador
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.search-container')) {
            limpiarResultados();
        }
    });
});