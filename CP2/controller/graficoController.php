<?php
require_once '../model/graficoModel.php';

//$op = $_GET['op'];
$op = 'cargar_grafico';

switch ($op) {
    case 'cargar_grafico':
        $datos = graficoModel::cargarGrafico();
        echo json_encode($datos);
        break;

    default:
        echo "Operación no válida";
        break;
}
?>