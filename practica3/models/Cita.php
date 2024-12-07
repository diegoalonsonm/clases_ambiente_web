<?php
require_once '../config/Conexion.php';

class Cita extends Conexion
{
    // atributos
    protected static $cnx;
    private $id = null;
    private $nombre_dueno = null;
    private $nombre_mascota = null;
    private $fecha = null;
    private $hora = null;

    // constructor
    public function __construct() {}

    // encapsuladores
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombreDueno()
    {
        return $this->nombre_dueno;
    }

    public function setNombreDueno($nombre_dueno)
    {
        $this->nombre_dueno = $nombre_dueno;
    }

    public function getNombreMascota()
    {
        return $this->nombre_mascota;
    }

    public function setNombreMascota($nombre_mascota)
    {
        $this->nombre_mascota = $nombre_mascota;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    // métodos
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function insertarCita() {
        $query = "insert into `citas` (nombre_dueno, nombre_mascota, fecha, hora) values (:nombre_dueno, :nombre_mascota, :fecha, :hora)";

        try {
            self::getConexion();

            $nombre_dueno = $this->getNombreDueno();
            $nombre_mascota = $this->getNombreMascota();
            $fecha = $this->getFecha();
            $hora = $this->getHora();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombre_dueno", $nombre_dueno, PDO::PARAM_STR);
            $resultado->bindParam(":nombre_mascota", $nombre_mascota, PDO::PARAM_STR);
            $resultado->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $resultado->bindParam(":hora", $hora, PDO::PARAM_STR);

            $resultado->execute();
            self::desconectar();

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

}