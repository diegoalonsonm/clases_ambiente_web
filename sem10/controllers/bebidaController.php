<?php
require_once '../models/Bebidas.php';

switch ($_GET["op"]) {
    case 'listarTodos':
        $bebida = new Bebidas();
        $bebidas = $bebida->getAllBebidas();

        $data = array();

        if (is_array($bebidas)) {
            foreach ($bebidas as $beb) {
                $data[] = array(
                    "0" => $beb->getId(),
                    "1" => $beb->getNombre(),
                    "2" => $beb->getCategoria(),
                    "3" => $beb->getInstrucciones(),
                    "4" => $beb->getDrinkImg()
                );
            }
        } else {
            echo "No hay bebidas registradas";
        }

        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($resultados);
    break;
}