const pdfModal   = document.getElementById('pdfModal');
const pdfViewer  = document.getElementById('pdfViewer');
const pdfTitleEl = document.getElementById('pdfTitle');

// Cargar el PDF elegido al abrir el modal
pdfModal.addEventListener('show.bs.modal', function (event) {
  const button   = event.relatedTarget;
  const pdfPath  = button.getAttribute('data-pdf');
  const pdfTitle = button.textContent.trim();

  pdfViewer.src = pdfPath;
  pdfTitleEl.textContent = pdfTitle;
});

// 👇 mover foco ANTES de que Bootstrap lo esconda
pdfModal.addEventListener('hide.bs.modal', function () {
  if (document.activeElement && pdfModal.contains(document.activeElement)) {
    document.activeElement.blur();
  }
});

// Limpiar el iframe ya cuando esté oculto
pdfModal.addEventListener('hidden.bs.modal', function () {
  pdfViewer.src = '';
});