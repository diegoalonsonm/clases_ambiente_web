const listaralquileres = () => {
    tabla = $('#listadoAlquileres').dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: 'Bfrtip',
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controllers/controller.php?op=pintarTabla',
            type: 'GET',
            dataType: 'json',
            error: (e) => {
                console.log(e.responseText)
            },
            bDestroy: true,
            iDisplayLength: 5
        }
    })
}

$(() => {
    listaralquileres()
})