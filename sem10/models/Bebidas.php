<?php
require_once '../config/Conexion.php';

class Bebidas extends Conexion {

    /* atributos */
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $categoria = null;
    private $instrucciones = null;
    private $drinkImg = null;

    /* constructor */
    public function __construct() {}

    /* encapsuladores */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


    public function getInstrucciones()
    {
        return $this->instrucciones;
    }

    public function setInstrucciones($instrucciones)
    {
        $this->instrucciones = $instrucciones;
    }

    public function getDrinkImg()
    {
        return $this->drinkImg;
    }

    public function setDrinkImg($drinkImg)
    {
        $this->drinkImg = $drinkImg;
    }

    /* metodos */
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public function desconectar() {
        self::$cnx = null;
    }

    public function getAllBebidas() {
        $query = "select idDrink, strDrink, strCategory, strInstructionsES from cocktails";
        $array = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();

            foreach ($resultado -> fetchAll() as $bebidaR) {
                $bebida = new Bebidas();
                $bebida->setId($bebidaR['idDrink']);
                $bebida->setNombre($bebidaR['strDrink']);
                $bebida->setCategoria($bebidaR['strCategory']);
                $bebida->setInstrucciones($bebidaR['strInstructionsES']);
                $array[] = $bebida;
            }
            return $array;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }
}