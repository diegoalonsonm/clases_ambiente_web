$(() => {
    tabla = $('#listadoAlquileres').DataTable({
        aProcessing: true,
        aServerSide: true,
        dom: 'Bfrtip',
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controllers/controller.php?op=pintarTabla',
            type: 'GET',
            data: {},
            dataType: 'json',
            contentType: false,
            processData: false,
            success: ((alquileres) => {
                console.log(alquileres)
            })
        },
        columns: [
            {alquileres: 'Nombre'},
            {alquileres: 'Veces'},
            {alquileres: '# Alquiler'}
        ],
            bDestroy: true,
            iDisplayLength: 5
    })
})