<?php
require_once '../models/Modelo.php';

// $op = 'pintarGrafico';

switch ($_GET["op"]) {
    case 'pintarGrafico':
        $alquileres = Modelo::mostrarGrafico();
        echo json_encode($alquileres);
        break;

    case 'pintarTabla':
        $datos = Modelo::mostrarTabla();
        $data = array();

        foreach ($datos as $dato) {
            $data[] = array(
                "0" => $dato->nombre,
                "1" => $dato->alquiler_id,
                "2" => $dato->veces
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