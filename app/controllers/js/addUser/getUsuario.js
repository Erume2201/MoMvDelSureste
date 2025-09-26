$(document).ready(function() {
    // === Variables globales ===
    // Contenedor del cuerpo de la tabla donde se insertarán las filas de usuarios.
    const tableBody = $('.usuarios-table tbody');
    // Contenedor de la paginación.
    const paginationContainer = $('.pagination');
    // Número de elementos a mostrar por página.
    const itemsPerPage = 5;
    // Variable para almacenar todos los datos de los usuarios obtenidos del servidor.
    let usersData = [];

/**
 * Genera la estructura HTML de una fila de usuario.
 * @param {Object} user - Objeto con los datos de un usuario.
 * @param {number} index - Índice del usuario en el array paginado.
 * @returns {string} - Cadena de texto con el HTML de la fila.
 */
function renderUserRow(user, index) {
    // Asegúrate de usar la propiedad user.id_usuario en el data-id
    return `
        <tr>
            <td>${index + 1}</td>
            <td>${user.nombre}</td>
            <td>${user.apellidos}</td>
            <td>${user.rfc}</td>
            <td>${user.email}</td>
            <td>${user.rol}</td>
            <td>${user.id_usuario}</td>
            <td class="acciones"> 
                <button class="btn-ver" title="Ver" data-id="${user.id_usuario}"><i class="fa-solid fa-eye"></i></button>
                <button class="btn-editar" title="Editar" data-id="${user.id_usuario}"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn-eliminar" title="Eliminar" data-id="${user.id_usuario}"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    `;
}

    // ---

    /**
     * Renderiza la tabla de usuarios para una página específica.
     * @param {number} [page=1] - El número de página a mostrar. Por defecto es 1.
     */
    function renderTable(page = 1) {
        // Limpia el contenido actual de la tabla.
        tableBody.empty();
        
        // Calcula los índices de inicio y fin para la paginación.
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        
        // Obtiene los usuarios para la página actual.
        const paginatedUsers = usersData.slice(start, end);

        // Itera sobre los usuarios y los añade a la tabla.
        paginatedUsers.forEach((user, index) => {
            tableBody.append(renderUserRow(user, start + index));
        });

        // Llama a la función para renderizar los controles de paginación.
        renderPagination(page);
    }

    // ---
    
    /**
     * Genera y muestra los enlaces de paginación.
     * @param {number} currentPage - La página actual.
     */
    function renderPagination(currentPage) {
        // Limpia los enlaces de paginación existentes.
        paginationContainer.empty();
        
        // Calcula el número total de páginas.
        const totalPages = Math.ceil(usersData.length / itemsPerPage);

        // Itera para crear un enlace por cada página.
        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>').addClass('page-item');
            
            // Si el índice coincide con la página actual, añade la clase 'active'.
            if (i === currentPage) {
                pageItem.addClass('active');
            }

            const pageLink = $('<a>').addClass('page-link').attr('href', '#').text(i);
            
            // Asigna un evento de clic para cambiar de página.
            pageLink.on('click', function(e) {
                e.preventDefault();
                renderTable(i);
            });

            pageItem.append(pageLink);
            paginationContainer.append(pageItem);
        }
    }

    // ---
    
    // === Solicitud AJAX para obtener datos de usuarios ===
    // Realiza una llamada AJAX para obtener la lista de usuarios del servidor.
    $.ajax({
        url: 'app/controllers/php/addUser/getUser.php', // URL del script PHP que devuelve los datos.
        type: 'GET',                           // Método de solicitud (GET para obtener datos).
        dataType: 'json'                       // Tipo de dato esperado en la respuesta (JSON).
    })
    .done(function(respuesta) {
        // Se ejecuta si la solicitud se completa con éxito.
        if (respuesta && respuesta.success === true) {
        usersData = respuesta.data;
        renderTable();
        } else {
            // Maneja el caso de una respuesta exitosa, pero con un error en los datos.
            tableBody.html('<tr><td colspan="7">No se pudo cargar la lista de usuarios.</td></tr>');
            console.error('Error desde el servidor:', respuesta.message);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        // Se ejecuta si la solicitud AJAX falla.
        console.error('Error AJAX:', textStatus, errorThrown);
        // Muestra un mensaje de error en la tabla.
        tableBody.html('<tr><td colspan="7">Ocurrió un problema al conectar con el servidor.</td></tr>');
    });




    // === Variables del Modal Editar Ricardo shto===
const modalEditar = $('#modalEditar');
const formEditarUsuario = $('#formEditarUsuario');

/**
 * Busca un usuario en el array global usersData por su id_usuario.
 */
function getUserById(id) {
    // Es crucial que la búsqueda coincida con la propiedad 'id_usuario' de tus datos
    return usersData.find(user => user.id_usuario.toString() === id.toString());
}





// -------------------------------------------------------------
// EVENTO PARA EDITAR USUARIO
// -------------------------------------------------------------

// 1. Manejo del Clic en el botón EDITAR (Delegación de eventos)
tableBody.on('click', '.btn-editar', function() {
    const userId = $(this).data('id'); 
    const user = getUserById(userId);
    if (user) {
        // Cargar datos en el formulario
        $('#edit-id').val(user.id_usuario);
        $('#edit-nombre').val(user.nombre);
        $('#edit-apellidos').val(user.apellidos);
        $('#edit-rfc').val(user.rfc);
        $('#edit-email').val(user.email);
        $('#edit-rol').val(user.rol); // Selecciona la opción del <select>

        modalEditar.css('display', 'block');
    } else {
        Swal.fire('Error', 'No se encontró el usuario para editar.', 'error');
    }
});


// 2. Manejo del Envío del Formulario de Edición (AJAX)
formEditarUsuario.on('submit', function(e) {
    e.preventDefault();
    
    // Serializa todos los datos del formulario (incluyendo el id_usuario oculto)
    const formData = $(this).serialize(); 

    $.ajax({
        url: 'app/controllers/php/addUser/updateUser.php',
        type: 'POST',
        data: formData,
        dataType: 'json'
    })
    .done(function(respuesta) {
        console.table(respuesta);
        if (respuesta && respuesta.success === true) {
            modalEditar.css('display', 'none'); // Cierra el modal
            Swal.fire('¡Actualizado!', 'El usuario ha sido actualizado correctamente.', 'success');
           reloadUsersData(); 
        } else {
            Swal.fire('Error', respuesta.message || 'No se pudo actualizar al usuario.', 'error');
        }
    })
    .fail(function() {
        modalEditar.css('display', 'none');
        Swal.fire('Error', 'Ocurrió un problema al conectar con el servidor.', 'error');
    });
});


// 3. Lógica para cerrar el modal de Editar
// Asumo que tu botón de cierre tiene la clase '.close-btn'
modalEditar.find('.close-btn').on('click', function() {
    modalEditar.css('display', 'none');
});

// Cierra el modal al hacer clic fuera
$(window).on('click', function(event) {
    if ($(event.target).is('#modalEditar')) {
        modalEditar.css('display', 'none');
    }
});

// Función de ejemplo para recargar los datos (Implementación básica)
function reloadUsersData() {
    // Esta función debe repetir la lógica de tu AJAX inicial
    $.ajax({
        url: 'app/controllers/php/addUser/getUser.php',
        type: 'GET',
        dataType: 'json'
    })
    .done(function(respuesta) {
        if (respuesta && respuesta.success === true) {
            usersData = respuesta.data;
            renderTable(1); // Recarga la tabla en la primera página
        }
    });
}
});