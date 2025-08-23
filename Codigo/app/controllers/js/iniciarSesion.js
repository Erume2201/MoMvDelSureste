$(document).ready(function () {
    var correo = document.getElementById('exampleFormControlEmail1');
    var pass = document.getElementById('password');
    var buscar = document.getElementById('iniciar_sesion');
    var form = document.getElementById('my-form');

       /**
     * Estructura del submit
     */
    $(form).submit(function (event) {
        event.preventDefault(); // Evita el envío del formulario si los campos están vacíos
    });

    /**
     * EVITAR ENVIAR CON Enter
     */
    // Maneja la pulsación de "Enter" en el campo de contraseña
    form.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Evitar el envío del formulario
        }
    });

    if (buscar != null) {
        buscar.addEventListener("click", function () {
           var actionURL = 'index.php?module=iniciar_sesion';
             window.location.href = actionURL;
                /* METODO PARA OBTENER DATOS DE LA BD
                $.ajax({
                    url: "modules/controller/php/login/iniciar_sesion.php",
                    type: "POST",
                    data: {
                        correo1: correo.value,
                        pass2: pass.value,
                    },
                    beforeSend: function() { 
                        //usuarioView.mostrarSpinner();
                    },
                    success: function (Response) {
                       // usuarioView.ocultarSpinner();
                        let datos = JSON.parse(Response);
                        if (datos.length === 0) {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Upps!',
                                text: 'Datos invalidos',
                            }); 
                        }
                     
                        else if (datos.length >0) {
                            
                            var idUser = datos[0].id_usuario;
                            var rolUser = datos[0].rol;
                            var estatus = datos[0].estatus;
                           
                            if (estatus === 'inactivo') {
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡Error critico!',
                                    text: 'Tu cuenta ha sido baneada',
                                }); 
                                
                            }else{
                                var actionURL = 'index.php?module=iniciar_sesion&public=Inicio&public='+idUser+'&rolUser='+rolUser;
                                Swal.fire({
                                icon: 'success',
                                title: '¡Bienvedido!',
                                text: 'Disfruta de nuestra biblioteca virtual',
                                didClose: () => {
                                    // Redirigir al usuario a una ruta específica
                                    window.location.href = actionURL;
                                }
                            });
                            }
                            

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Upps!',
                                text: 'Datos invalidos',
                            });
                        }
                    }
                });*/
            
        });
    }



});



