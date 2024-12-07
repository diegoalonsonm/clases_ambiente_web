<?php
require_once '../config/Conexion.php';

class Modelo extends Conexion
{
    // conexion
    protected static $cnx;

    // atributos
    private $alquiler_id;
    private $cliente_id;
    private $fecha_alquiler;
    private $monto;
    private $vehiculo;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $genero;
    private $provincia;
    private $email;

    // getters y setters
    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * @param mixed $cliente_id
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    /**
     * @return mixed
     */
    public function getAlquilerId()
    {
        return $this->alquiler_id;
    }

    /**
     * @param mixed $alquiler_id
     */
    public function setAlquilerId($alquiler_id)
    {
        $this->alquiler_id = $alquiler_id;
    }

    /**
     * @return mixed
     */
    public function getFechaAlquiler()
    {
        return $this->fecha_alquiler;
    }

    /**
     * @param mixed $fecha_alquiler
     */
    public function setFechaAlquiler($fecha_alquiler)
    {
        $this->fecha_alquiler = $fecha_alquiler;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * @param mixed $vehiculo
     */
    public function setVehiculo($vehiculo)
    {
        $this->vehiculo = $vehiculo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // constructor
    public function __construct(){}

    // metodos de conexion
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    // metodos
    public static function mostrarGrafico(){
        $query = "SELECT vehiculo, SUM(monto) AS monto_total_recaudado FROM alquileres WHERE fecha_alquiler 
        BETWEEN '2024-06-25' AND '2024-07-10' GROUP BY vehiculo ORDER BY monto_total_recaudado DESC LIMIT 5;";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }

    }

    public static function mostrarTabla() {
        $query = "select c.nombre, a.alquiler_id, count(a.alquiler_id) as veces from clientes c inner join
        alquileres a on c.cliente_id = a.cliente_id group by c.nombre, a.alquiler_id order by veces desc";

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }
}