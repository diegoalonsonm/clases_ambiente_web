$.ajax({
    url: '../controllers/controller.php?op=pintarGrafico',
    type: 'POST',
    data: {},
    contentType: false,
    processData: false,
    success: function (datos) {
        let alquileres = JSON.parse(datos)
        let etiquetas = []
        let valores = []

        alquileres.forEach(alquiler => {
            etiquetas.push(alquiler.vehiculo)
            valores.push(alquiler.monto_total_recaudado)
        })

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Carros con mayor recaudacion',
                    data: valores,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    },
    error: function (e) {
        console.log(e.responseText)
    }
})