<?php
require_once '../models/Cita.php';

switch ($_GET["op"]) {
    case 'insertarCita':
        $nombre_dueno = isset($_POST["nombre_dueno"]) ? trim($_POST["nombre_dueno"]) : "";
        $nombre_mascota = isset($_POST["nombre_mascota"]) ? trim($_POST["nombre_mascota"]) : "";
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : "";
        $hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : "";

        $cita = new Cita();

        $cita->setNombreDueno($nombre_dueno);
        $cita->setNombreMascota($nombre_mascota);
        $cita->setFecha($fecha);
        $cita->setHora($hora);

        $cita->insertarCita();
    break;
}