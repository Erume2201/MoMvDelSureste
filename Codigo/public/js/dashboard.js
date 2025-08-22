document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("graficaVentas").getContext("2d");
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Ventas", "Restante"],
            datasets: [{
                data: [12000, 3000], // se puede cargar dinámico con AJAX
                backgroundColor: ["#4caf50", "#ccc"]
            }]
        }
    });
});
