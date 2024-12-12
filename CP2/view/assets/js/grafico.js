function cargarGrafico() {
    $.ajax({
        url: '../controller/graficoController.php',
        type: 'POST',
        data: {},
        contentType: false,
        processData: false,
        success: function(datos) {
            let top5productos = JSON.parse(datos)
            let etiquetas = []
            let valores = []

            top5productos.forEach(producto => {
                etiquetas.push(producto.nombre_producto)
                valores.push(producto.cantidad)
            })

            const ctx = document.getElementById('myChart')

            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: etiquetas,
                datasets: [{
                    label: '# de ventas',
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
        error: function(e) {
            console.log('Error en la petición', e.message)
        }
    });
}

$(() => {
    cargarGrafico()
})
