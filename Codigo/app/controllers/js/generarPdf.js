window.onload = function() {
    const botonGenerarPDF = document.getElementById('cotizar');

    if (botonGenerarPDF) {
        botonGenerarPDF.addEventListener('click', function() {
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

   function generarPDFConFormato(data) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'mm', 'a4');
        
        const margin_left = 25;
        const content_width = 160; // Ancho del área de contenido
        let y = 30;
        const fieldHeight = 6;
        const row_spacing = 7;

        // Título
        doc.setFont('Helvetica', 'bold');
        doc.setFontSize(14);
        doc.text('SOLICITUD ALTA DE CLIENTE Y CONTRATO SERVICIOS', margin_left, y);
        y += 10;

        // Sección: Datos generales de facturación
        doc.setFontSize(12);
        doc.text('Datos generales de facturación', margin_left, y);
        y += 5;
        doc.line(margin_left, y, margin_left + content_width, y);
        y += 5;
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        y += row_spacing;

        // Fila 1: Nombre/Razón Social y RFC
        doc.text('1. Nombre o Razón Social:', margin_left, y);
        doc.rect(margin_left + 43, y - 4, 81, fieldHeight);
        doc.text(data.nombre_razon_social, margin_left + 44, y);

        doc.text('2. RFC:', margin_left + 125, y);
        doc.rect(margin_left + 138, y - 4, 43, fieldHeight);
        doc.text(data.rfc, margin_left + 139, y);
        y += row_spacing;

        // Fila 2: Domicilio Fiscal
        doc.text('3. Domicilio Fiscal:', margin_left, y);
        doc.rect(margin_left + 35, y - 4, 146, fieldHeight); // Ancho ajustado
        doc.text(data.domicilio_fiscal, margin_left + 37, y);
        y += row_spacing;

        // Fila 3: Colonia, Ciudad, Estado
        doc.text('4. Colonia:', margin_left, y);
        doc.rect(margin_left + 20, y - 4, 40, fieldHeight);
        doc.text(data.colonia_fiscal, margin_left + 22, y);

        doc.text('5. Ciudad:', margin_left + 65, y);
        doc.rect(margin_left + 85, y - 4, 40, fieldHeight);
        doc.text(data.ciudad_fiscal, margin_left + 87, y);

        doc.text('6. Estado:', margin_left + 130, y);
        doc.rect(margin_left + 150, y - 4, 31, fieldHeight); // Ancho ajustado
        doc.text(data.estado_fiscal, margin_left + 152, y);
        y += row_spacing;

        // Fila 4: CP y Tipo localidad
        doc.text('7. CP:', margin_left, y);
        doc.rect(margin_left + 15, y - 4, 20, fieldHeight);
        doc.text(data.cp_fiscal, margin_left + 17, y);

        doc.text('8. Tipo localidad:', margin_left + 45, y);
        doc.rect(margin_left + 75, y - 4, 40, fieldHeight);
        doc.text(data.tipo_localidad, margin_left + 77, y);
        y += row_spacing + 3;

        // Fila 5: Nombre Del Apoderado Legal
        doc.text('9. Nombre Del Apoderado Legal:', margin_left, y);
        doc.rect(margin_left + 60, y - 4, 116, fieldHeight); // Ancho ajustado
        doc.text(data.nombre_apoderado_legal, margin_left + 64, y);
        y += row_spacing;

        // Fila 6: Formas de pago
        doc.text('10. Forma de pago:', margin_left, y);
        doc.rect(margin_left + 40, y - 4, 40, fieldHeight); // Ancho ajustado
        doc.text(data.forma_pago, margin_left + 42, y);

        doc.text('11. Método de pago:', margin_left + 85, y); // Posición ajustada
        doc.rect(margin_left + 120, y - 4, 40, fieldHeight); // Ancho ajustado
        doc.text(data.metodo_pago, margin_left + 117, y);
        y += row_spacing;

        doc.text('12. Uso CFDI:', margin_left, y); // Posición ajustada
        doc.rect(margin_left + 40, y - 4, 35, fieldHeight); // Ancho ajustado
        doc.text(data.uso_cfdi, margin_left + 43, y);
        y += row_spacing;

        // Fila 7: Régimen Fiscal
        doc.text('13. Régimen Fiscal:', margin_left, y);
        doc.rect(margin_left + 40, y - 4, 141, fieldHeight); // Ancho ajustado
        doc.text(data.regimen_fiscal, margin_left + 42, y);
        y += row_spacing;

        // Fila 8: Contacto
        doc.text('14. Contacto de Cuentas por pagar:', margin_left, y);
        doc.rect(margin_left + 60, y - 4, 55, fieldHeight); // Ancho ajustado
        doc.text(data.contacto_cuentas, margin_left + 62, y);

        doc.text('Email:', margin_left + 120, y); // Posición ajustada
        doc.rect(margin_left + 135, y - 4, 40, fieldHeight);
        doc.text(data.email_contacto, margin_left + 137, y);
        y += row_spacing;

        doc.text('Teléfono:', margin_left, y); // Posición ajustada
        doc.rect(margin_left + 40, y - 4, 25, fieldHeight);
        doc.text(data.telefono_contacto, margin_left + 48, y);
        y += row_spacing;

        // Sección: Datos generales del sitio de recolección de residuos
        y += 10;
        doc.setFontSize(12);
        doc.setFont('Helvetica', 'bold');
        doc.text('Datos generales del sitio de recolección de residuos:', margin_left, y);
        y += 5;
        doc.line(margin_left, y, margin_left + content_width, y);
        y += 5;
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        y += row_spacing;

        // Fila 1: Nombre/Razón Social y Registro Ambiental
        doc.text('15. Nombre o Razón Social:', margin_left, y);
        doc.rect(margin_left + 50, y - 4, 70, fieldHeight);
        doc.text(data.nombre_rec_residuos, margin_left + 52, y);

        doc.text('16. Número Registro Ambiental:', margin_left + 125, y);
        doc.rect(margin_left + 175, y - 4, 20, fieldHeight);
        doc.text(data.registro_ambiental, margin_left + 177, y);
        y += row_spacing;

        // Fila 2: Dirección y Colonia
        doc.text('17. Dirección:', margin_left, y);
        doc.rect(margin_left + 25, y - 4, 90, fieldHeight);
        doc.text(data.direccion_rec_residuos, margin_left + 27, y);

        doc.text('18. Colonia:', margin_left + 120, y);
        doc.rect(margin_left + 140, y - 4, 50, fieldHeight);
        doc.text(data.colonia_rec_residuos, margin_left + 142, y);
        y += row_spacing;

        // Fila 3: Ciudad, Estado y CP
        doc.text('19. Ciudad:', margin_left, y);
        doc.rect(margin_left + 20, y - 4, 40, fieldHeight);
        doc.text(data.ciudad_rec_residuos, margin_left + 22, y);

        doc.text('20. Estado:', margin_left + 65, y);
        doc.rect(margin_left + 85, y - 4, 30, fieldHeight);
        doc.text(data.estado_rec_residuos, margin_left + 87, y);

        doc.text('21. CP:', margin_left + 120, y);
        doc.rect(margin_left + 135, y - 4, 20, fieldHeight);
        doc.text(data.cp_rec_residuos, margin_left + 137, y);
        y += row_spacing;

        // Fila 4: Horario y Nombre Responsable
        doc.text('22. Horario de trabajo:', margin_left, y);
        doc.rect(margin_left + 45, y - 4, 30, fieldHeight);
        doc.text(data.horario_trabajo, margin_left + 47, y);

        doc.text('23. Nombre responsable entrega residuo:', margin_left + 80, y);
        doc.rect(margin_left + 150, y - 4, 40, fieldHeight);
        doc.text(data.nombre_responsable, margin_left + 152, y);
        y += row_spacing;

        // Fila 5: Teléfono responsable
        doc.text('24. Teléfono responsable entrega residuo:', margin_left, y);
        doc.rect(margin_left + 65, y - 4, 30, fieldHeight);
        doc.text(data.telefono_responsable, margin_left + 67, y);
        y += row_spacing;

        // Sección: Referencias específicas
        y += 10;
        doc.setFontSize(12);
        doc.setFont('Helvetica', 'bold');
        doc.text('Referencias específicas de la dirección de recolección:', margin_left, y);
        y += 5;
        doc.line(margin_left, y, margin_left + content_width, y);
        y += 5;
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');

        // Fila 1: Referencias
        doc.rect(margin_left, y - 4, content_width, fieldHeight);
        doc.text(data.referencias_recoleccion, margin_left + 2, y);
        y += row_spacing;

        // Fila 2: Link de Google Maps
        doc.text('26. Link de ubicación en Google Maps:', margin_left, y);
        doc.rect(margin_left + 65, y - 4, 90, fieldHeight);
        doc.text(data.google_maps_link, margin_left + 67, y);
        y += 30;

        // Sección: Firma
        doc.setFontSize(10);
        doc.setFont('Helvetica', 'normal');
        let signature_x = margin_left + (content_width / 2) - 35;
        doc.line(signature_x, y, signature_x + 70, y);
        y += 5;
        doc.text('Firma del Solicitante', signature_x + 5, y);
        
        doc.save('solicitud-cliente.pdf');
    }
};