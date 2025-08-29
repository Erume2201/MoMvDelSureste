window.onload = function() {
    const botonGenerarPDF = document.getElementById('cotizar');

    if (botonGenerarPDF) {
        botonGenerarPDF.addEventListener('click', function() {
            // Recolecta los datos de los campos del formulario
            const datosFormulario = {
                nombre_razon_social: document.querySelector('input[name="nombre_razon_social"]').value,
                rfc: document.querySelector('input[name="rfc"]').value,
                domicilio_fiscal: document.querySelector('input[name="domicilio_fiscal"]').value,
                colonia_fiscal: document.querySelector('input[name="colonia_fiscal"]').value,
                ciudad_fiscal: document.querySelector('input[name="ciudad_fiscal"]').value,
                estado_fiscal: document.querySelector('input[name="estado_fiscal"]').value,
                cp_fiscal: document.querySelector('input[name="cp_fiscal"]').value,
                tipo_localidad: document.querySelector('input[name="tipo_localidad"]').value,
                nombre_apoderado_legal: document.querySelector('input[name="nombre_apoderado_legal"]').value,
                forma_pago: document.querySelector('input[name="forma_pago"]').value,
                metodo_pago: document.querySelector('input[name="metodo_pago"]').value,
                uso_cfdi: document.querySelector('input[name="uso_cfdi"]').value,
                regimen_fiscal: document.querySelector('input[name="regimen_fiscal"]').value,
                contacto_cuentas: document.querySelector('input[name="contacto_cuentas"]').value,
                email_contacto: document.querySelector('input[name="email_contacto"]').value,
                telefono_contacto: document.querySelector('input[name="telefono_contacto"]').value,
                nombre_rec_residuos: document.querySelector('input[name="nombre_rec_residuos"]').value,
                registro_ambiental: document.querySelector('input[name="registro_ambiental"]').value,
                direccion_rec_residuos: document.querySelector('input[name="direccion_rec_residuos"]').value,
                colonia_rec_residuos: document.querySelector('input[name="colonia_rec_residuos"]').value,
                ciudad_rec_residuos: document.querySelector('input[name="ciudad_rec_residuos"]').value,
                estado_rec_residuos: document.querySelector('input[name="estado_rec_residuos"]').value,
                cp_rec_residuos: document.querySelector('input[name="cp_rec_residuos"]').value,
                horario_trabajo: document.querySelector('input[name="horario_trabajo"]').value,
                nombre_responsable: document.querySelector('input[name="nombre_responsable"]').value,
                telefono_responsable: document.querySelector('input[name="telefono_responsable"]').value,
                referencias_recoleccion: document.querySelector('input[name="referencias_recoleccion"]').value,
                google_maps_link: document.querySelector('input[name="google_maps_link"]').value,
            };

            generarPDFConFormato(datosFormulario);
        });
    }

    /**
     * Función para generar el PDF a partir de los datos, replicando el formato de la imagen.
     * @param {Object} data - Objeto con los valores del formulario.
     */
    function generarPDFConFormato(data) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'mm', 'a4');

        let x = 20; // Posición X inicial
        let y = 30; // Posición Y inicial
        const fieldHeight = 6;
        
        // -------------------------
        // Título del documento
        // -------------------------
        doc.setFont('Helvetica', 'bold');
        doc.setFontSize(14);
        doc.text('SOLICITUD ALTA DE CLIENTE Y CONTRATO SERVICIOS', 25, y);
        y += 15;

        // -------------------------
        // Datos generales de facturación
        // -------------------------
        doc.setFontSize(12);
        doc.text('Datos generales de facturación', x, y);
        y += 5;

        // Fila 1
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        doc.text('1. Nombre o Razón Social:', x, y);
        doc.rect(x + 50, y - 4, 90, fieldHeight);
        doc.text(data.nombre_razon_social, x + 52, y);
        doc.text('2. RFC:', 150, y);
        doc.rect(165, y - 4, 30, fieldHeight);
        doc.text(data.rfc, 167, y);
        y += 7;

        // Fila 2
        doc.text('3. Domicilio Fiscal:', x, y);
        doc.rect(x + 35, y - 4, 150, fieldHeight);
        doc.text(data.domicilio_fiscal, x + 37, y);
        y += 7;

        // Fila 3
        doc.text('4. Colonia:', x, y);
        doc.rect(x + 20, y - 4, 70, fieldHeight);
        doc.text(data.colonia_fiscal, x + 22, y);
        doc.text('5. Ciudad:', 100, y);
        doc.rect(120, y - 4, 35, fieldHeight);
        doc.text(data.ciudad_fiscal, 122, y);
        doc.text('6. Estado:', 160, y);
        doc.rect(180, y - 4, 25, fieldHeight);
        doc.text(data.estado_fiscal, 182, y);
        y += 7;

        // Fila 4
        doc.text('7. CP:', x, y);
        doc.rect(x + 15, y - 4, 30, fieldHeight);
        doc.text(data.cp_fiscal, x + 17, y);
        doc.text('8. Tipo localidad:', x + 55, y);
        doc.rect(x + 85, y - 4, 40, fieldHeight);
        doc.text(data.tipo_localidad, x + 87, y);
        y += 7;

        // Fila 5
        doc.text('9. Nombre Del Apoderado Legal:', x, y);
        doc.rect(x + 65, y - 4, 120, fieldHeight);
        doc.text(data.nombre_apoderado_legal, x + 67, y);
        y += 7;

        // Fila 6
        doc.text('10. Forma de pago:', x, y);
        doc.rect(x + 40, y - 4, 50, fieldHeight);
        doc.text(data.forma_pago, x + 42, y);
        doc.text('11. Método de pago:', 100, y);
        doc.rect(135, y - 4, 50, fieldHeight);
        doc.text(data.metodo_pago, 137, y);
        doc.text('12. Uso CFDI:', 190, y);
        doc.rect(215, y - 4, 30, fieldHeight);
        doc.text(data.uso_cfdi, 217, y);
        y += 7;

        // Fila 7
        doc.text('13. Régimen Fiscal:', x, y);
        doc.rect(x + 40, y - 4, 150, fieldHeight);
        doc.text(data.regimen_fiscal, x + 42, y);
        y += 7;

        // Fila 8
        doc.text('14. Contacto de Cuentas por pagar:', x, y);
        doc.rect(x + 60, y - 4, 60, fieldHeight);
        doc.text(data.contacto_cuentas, x + 62, y);
        doc.text('Email:', 130, y);
        doc.rect(145, y - 4, 50, fieldHeight);
        doc.text(data.email_contacto, 147, y);
        doc.text('Teléfono:', 200, y);
        doc.rect(220, y - 4, 40, fieldHeight);
        doc.text(data.telefono_contacto, 222, y);
        y += 15;

        // ----------------------------------------
        // Datos generales del sitio de recolección de residuos
        // ----------------------------------------
        doc.setFontSize(12);
        doc.setFont('Helvetica', 'bold');
        doc.text('Datos generales del sitio de recolección de residuos:', x, y);
        y += 5;

        // Fila 1
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        doc.text('15. Nombre o Razón Social:', x, y);
        doc.rect(x + 50, y - 4, 90, fieldHeight);
        doc.text(data.nombre_rec_residuos, x + 52, y);
        doc.text('16. Número Registro Ambiental:', 150, y);
        doc.rect(190, y - 4, 30, fieldHeight);
        doc.text(data.registro_ambiental, 192, y);
        y += 7;

        // Fila 2
        doc.text('17. Dirección:', x, y);
        doc.rect(x + 25, y - 4, 160, fieldHeight);
        doc.text(data.direccion_rec_residuos, x + 27, y);
        doc.text('18. Colonia:', 195, y);
        doc.rect(215, y - 4, 35, fieldHeight);
        doc.text(data.colonia_rec_residuos, 217, y);
        y += 7;

        // Fila 3
        doc.text('19. Ciudad:', x, y);
        doc.rect(x + 20, y - 4, 35, fieldHeight);
        doc.text(data.ciudad_rec_residuos, x + 22, y);
        doc.text('20. Estado:', x + 60, y);
        doc.rect(x + 80, y - 4, 30, fieldHeight);
        doc.text(data.estado_rec_residuos, x + 82, y);
        doc.text('21. CP:', x + 115, y);
        doc.rect(x + 130, y - 4, 25, fieldHeight);
        doc.text(data.cp_rec_residuos, x + 132, y);
        y += 7;

        // Fila 4
        doc.text('22. Horario de trabajo:', x, y);
        doc.rect(x + 45, y - 4, 50, fieldHeight);
        doc.text(data.horario_trabajo, x + 47, y);
        doc.text('23. Nombre responsable entrega residuo:', 100, y);
        doc.rect(160, y - 4, 60, fieldHeight);
        doc.text(data.nombre_responsable, 162, y);
        y += 7;

        // Fila 5
        doc.text('24. Teléfono responsable entrega residuo:', x, y);
        doc.rect(x + 65, y - 4, 50, fieldHeight);
        doc.text(data.telefono_responsable, x + 67, y);
        y += 15;

        // ----------------------------------------
        // Referencias
        // ----------------------------------------
        doc.setFontSize(12);
        doc.setFont('Helvetica', 'bold');
        doc.text('Referencias específicas de la dirección de recolección:', x, y);
        y += 5;

        // Fila de referencias
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        doc.rect(x, y - 4, 180, fieldHeight);
        doc.text(data.referencias_recoleccion, x + 2, y);
        y += 10;

        // Fila de link de Google Maps
        doc.text('26. Link de ubicación en Google Maps:', x, y);
        doc.rect(x + 65, y - 4, 115, fieldHeight);
        doc.text(data.google_maps_link, x + 67, y);
        y += 30;

        // ----------------------------------------
        // Firma del cliente
        // ----------------------------------------
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        
        // Línea para la firma
        doc.line(70, y, 140, y);
        y += 5;
        doc.text('Firma del Solicitante', 95, y);
        
        // Guarda el PDF
        doc.save('solicitud-cliente.pdf');
    }
};