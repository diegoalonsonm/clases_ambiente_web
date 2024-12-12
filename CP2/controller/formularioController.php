<?php
require_once '../model/formularioModel.php';

$op = $_GET['op'];

switch ($op) {
    case 'cargar_productos':
        $rsptaSelect = "";

        // Crear una variable para usar el modelo
        //ejecutar el metodo para buscar los productos y guardar el resultado en la variable $result
        $result = formularioModel::cargarProductos();

        // Crear las opciones del select
        if (count($result) > 0) {
            foreach ($result as $row) {
                $rsptaSelect .= "<option value='" . $row['id_producto'] . "'>" . $row['nombre_producto'] . "</option>";
            }
           // while ($row = $result->fetchAll()) {
            //}
        } else {
            $rsptaSelect .= "<option value=''>No hay productos disponibles</option>";
        }
        echo $rsptaSelect;
        break;

    case 'obtener_precio':
        // Obtener el ID del producto enviado por AJAX
        $id_producto = $_GET['id'];

        // Crear una variable para usar el modelo
        //ejecutar el metodo para buscar el precio del producto
        $producto = new formularioModel();
        $producto->setIdProducto($id_producto);
        $result = $producto->obtenerPrecio($id_producto);
        //echo $result;
        
        if ($result) {
            echo json_encode($result);
        } else {
            echo "Precio no encontrado";
        }
        break;

    case 'insertar_venta':
        // Obtener los datos enviados por AJAX
        $producto = $_GET['idProducto'];
        $cantidad = $_GET['cantidad'];
        $precio = $_GET['precio'];
        $total = $cantidad * $precio;
        $fecha = date('Y-m-d');

        // Consulta SQL para insertar la venta
        $venta = new formularioModel();
        $venta->setIdProducto($producto);
        $venta->setCantidad($cantidad);
        $venta->setTotalVenta($total);
        $venta->setFechaVenta($fecha);

        $venta->insertarVenta();

        // Crear una variable para usar el modelo
        //ejecutar el metodo para insertar el producto
        if ($conn->query($sql) === TRUE) {
            //generar el JSON de respuesta "Venta registrada correctamente"
            echo json_encode("Venta registrada correctamente");
        } else {
            //generar el JSON de respuesta del error "Error al registrar la venta: "
            echo json_encode("Error al registrar la venta: " . $conn->error);
        }
        break;

    default:
        echo "Operación no válida";
        break;
}
?>