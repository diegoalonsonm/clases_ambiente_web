<?php
    $productos = array (
        "furtas" => array("manzana", "pera", "uva"),
        "verduras" => array("zanahoria", "cebolla"),
    );

    //print_r($productos);
    //echo "<br>";
    //var_dump($productos);

    echo json_encode($productos); // convierte un arreglo a formato JSON
    echo "<br>";

    $cliente = array("cedula" => "123456", "nombre" => "Juan", "apellido" => "Perez");
    echo json_encode(array("status" => 1, "msg" => "OK", "data" => $cliente));

    $dataString = '{"edad":19, "data": {"cedula": "123456","nombre": "Juan","apellido": "Perez"}}';
    $objeto = json_decode($dataString);
    echo "<br>";
    print_r($objeto -> edad);
    echo "<br>";
    print_r($objeto -> data -> cedula);
    echo "<br>";
    print_r($objeto -> data -> nombre);
?>
