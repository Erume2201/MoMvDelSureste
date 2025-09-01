// Gráfico de Porcentaje (Línea)
// Obtenemos el contexto del canvas con el ID 'percentageChart'
const percentageCtx = document.getElementById('percentageChart').getContext('2d');

// Creamos una nueva instancia de Chart.js
new Chart(percentageCtx, {
    // Tipo de gráfico: línea
    type: 'line',
    data: {
        // Etiquetas para el eje X
        labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
            // Datos de ejemplo para el gráfico
            data: [30, 40, 35, 60, 45, 55, 30, 45, 40, 65, 80, 95],
            // Color de la línea
            borderColor: '#97ff91ff',
            // Suaviza las curvas de la línea
            tension: 0.4,
            // No rellena el área debajo de la línea
            fill: false
        }]
    },
    options: {
        // Opciones de configuración
        responsive: true,
        maintainAspectRatio: false, // Permite que el gráfico se adapte sin mantener la proporción
        plugins: {
            legend: {
                // Oculta la leyenda del gráfico
                display: false
            }
        },
        scales: {
            y: {
                // El eje Y comienza en cero
                beginAtZero: true
            },
            x: {
                // Oculta las etiquetas del eje X
                display: false
            }
        }
    }
});

// Gráfico de Órdenes (Barras)
// Obtenemos el contexto del canvas con el ID 'ordersChart'
const ordersCtx = document.getElementById('ordersChart').getContext('2d');

// Creamos una nueva instancia de Chart.js
new Chart(ordersCtx, {
    // Tipo de gráfico: barras
    type: 'bar',
    data: {
        // Etiquetas para el eje X
        labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
            label: 'Total ordenes',
            // Datos de ejemplo para el gráfico
            data: [400, 550, 600, 700, 850, 950, 750, 800, 900, 750, 850, 920],
            // Color de las barras
            backgroundColor: '#008000',
            // Color del borde de las barras
            borderColor: '#0e0f0eff',
            // Ancho del borde de las barras
            borderWidth: 1,
            // Radio del borde para las barras
            borderRadius: 5
        }]
    },
    options: {
        // Opciones de configuración
        responsive: true,
        maintainAspectRatio: false, // Permite que el gráfico se adapte
        plugins: {
            legend: {
                // Oculta la leyenda del gráfico
                display: false
            }
        },
        scales: {
            y: {
                // El eje Y comienza en cero
                beginAtZero: true
            }
        }
    }
});
