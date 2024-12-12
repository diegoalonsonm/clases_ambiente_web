    // Cargar productos al iniciar la página
    $.ajax({
        url: "../controller/formularioController.php?op=cargar_productos",
        type: 'POST',
        data: {},
        contentType: false,
        processData: false,
        success: function(data) {
            $("#producto").html(data);
        },
        error: function(xhr, status, error) {}
    });

    // Al cambiar el producto, actualizar precio
    $("#producto").change(function() {
        var idProducto = $(this).val();
        const cantidad = $("#cantidad").val()
        const precioTotal = $("#precioTotal")

        $.ajax({
            url: "../controller/formularioController.php?op=obtener_precio&id=" + idProducto,
            type: "POST",
            data: { id: idProducto },
            success: function(data) {
                $("#precio").val(JSON.parse(data));
                precioTotal.val(JSON.parse(data) * cantidad)                                
            },
            error: function(xhr, status, error) {}
        });
    });
    
    $("#cantidad").on('input', function () {
        var cantidad = $(this).val()
        var precio = $("#precio").val()
        var total = cantidad * precio

        $("#precioTotal").val(total.toFixed(2))
    });

    // Al enviar el formulario
    $("form").submit(function(e) {
        e.preventDefault(); // Evita el envío por defecto del formulario

        var producto = $("#producto").val();
        var cantidad = $("#cantidad").val();
        var precioTotal = $("#precioTotal").val();

        $.ajax({
            url: "../controller/formularioController.php?op=insertar_venta&idProducto=" + producto +
                "&cantidad=" + cantidad + "&precio=" + precioTotal,
            type: "POST",
            data: { producto: producto, cantidad: cantidad, precio: precioTotal },
            success: function(data) {
                console.log(data)
                Swal.fire({
                    icon: 'success',
                    title: '¡Venta registrada!',
                    text: 'La venta se ha registrado correctamente.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Limpiar los textbox del formulario aqui
                    }
                });
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salió mal. Por favor, intenta de nuevo.'
                });
            }
        });
    });