// js/firma.js

document.addEventListener('DOMContentLoaded', () => {
    const startSignBtn = document.getElementById('start-sign-btn');
    const signatureSection = document.getElementById('signature-section');
    const signaturePadCanvas = document.getElementById('signature-pad');
    const clearBtn = document.getElementById('clear-btn');
    const saveBtn = document.getElementById('save-btn');
    const loader = document.getElementById('loader');

    // Inicializa Signature Pad
    const signaturePad = new SignaturePad(signaturePadCanvas);

    // Ruta del PDF base que ya tienes
   const pdfUrl = 'app/pdf/cotizacion-002.pdf';

    // Muestra el área de firma al hacer clic en "Firmar Documento"
    startSignBtn.addEventListener('click', () => {
        startSignBtn.style.display = 'none';
        signatureSection.style.display = 'block';
        signaturePad.clear();
    });

    // Limpia el lienzo de la firma
    clearBtn.addEventListener('click', () => {
        signaturePad.clear();
    });

    // Guarda la firma y modifica el PDF
    saveBtn.addEventListener('click', async () => {
        if (signaturePad.isEmpty()) {
            alert("Por favor, firme el documento primero.");
            return;
        }

        loader.style.display = 'block';
        saveBtn.disabled = true;

        try {
            // 1. Cargar el PDF existente como un array de bytes
            const existingPdfBytes = await axios.get(pdfUrl, { responseType: 'arraybuffer' });
            const pdfDoc = await PDFLib.PDFDocument.load(existingPdfBytes.data);

            // 2. Obtener la firma como una imagen PNG
            const signatureImageBytes = signaturePad.toDataURL('image/png');
            const signatureImage = await pdfDoc.embedPng(signatureImageBytes);

            const pages = pdfDoc.getPages();
            const firstPage = pages[0];

            // 3. Posicionar y agregar la firma
            const { width, height } = firstPage.getSize();
            const signatureWidth = 70;
            const signatureHeight = 25;
            const signature_x = 25 + (160 / 2) - (signatureWidth / 2); // Misma lógica que en tu JS
            const signature_y = 250 - signatureHeight; // Posición de la firma

            firstPage.drawImage(signatureImage, {
                x: signature_x,
                y: signature_y,
                width: signatureWidth,
                height: signatureHeight,
            });

            // 4. Agregar el texto de "Cotización Aceptada"
            const today = new Date().toLocaleDateString('es-MX', {
                year: 'numeric', month: 'long', day: 'numeric'
            });

            firstPage.drawText(`Cotización Aceptada el ${today}`, {
                x: 25,
                y: 20, // Posición en la parte superior del documento
                size: 12,
                font: await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold),
                color: PDFLib.rgb(0, 0.5, 0), // Verde
            });

            // 5. Guardar el nuevo PDF modificado
            const modifiedPdfBytes = await pdfDoc.save();

            // 6. Ofrecer la descarga al usuario
            const blob = new Blob([modifiedPdfBytes], { type: 'application/pdf' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'cotizacion_firmada.pdf';
            link.click();

        } catch (error) {
            console.error("Error al firmar o guardar el PDF:", error);
            alert("Ocurrió un error al procesar el documento.");
        } finally {
            loader.style.display = 'none';
            saveBtn.disabled = false;
            signatureSection.style.display = 'none';
            startSignBtn.style.display = 'block';
        }
    });
});