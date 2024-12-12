<?php
require_once '../models/Modelo.php';

// $op = 'pintarGrafico';

switch ($_GET["op"]) {
    case 'pintarGrafico':
        $alquileres = Modelo::mostrarGrafico();
        echo json_encode($alquileres);
        break;

    case 'pintarTabla':
        $alquileres = Modelo::mostrarTabla();
        $data = array();

        foreach ($alquileres as $alquiler) {
            $data[] = array(
                "Nombre" => $alquiler['nombre'],
                "# Alquiler" => $alquiler['alquiler_id'],
                "Veces" => $alquiler['veces']
            );
        }
        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;
    default:
        # code...
        break;
}