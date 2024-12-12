<?php
    require_once '../config/Conexion.php';
    class formularioModel extends Conexion {
        /*=============================================
        =            Atributos de la Clase            =
        =============================================*/
        protected static $cnx;
        private static $idVenta;
        private static $idProducto;
        private static $cantidad;
        private static $totalVenta;
        private static $fechaVenta;
        /*=====  End of Atributos de la Clase  ======*/

        // getters y setters
        public static function getIdVenta() {
            return self::$idVenta;
        }

        public static function setIdVenta($idVenta) {
            self::$idVenta = $idVenta;
        }

        public static function getIdProducto() {
            return self::$idProducto;
        }

        public static function setIdProducto($idProducto) {
            self::$idProducto = $idProducto;
        }

        public static function getCantidad() {
            return self::$cantidad;
        }

        public static function setCantidad($cantidad) {
            self::$cantidad = $cantidad;
        }

        public static function getTotalVenta() {
            return self::$totalVenta;
        }

        public static function setTotalVenta($totalVenta) {
            self::$totalVenta = $totalVenta;
        }

        public static function getFechaVenta() {
            return self::$fechaVenta;
        }

        public static function setFechaVenta($fechaVenta) {
            self::$fechaVenta = $fechaVenta;
        }
        
        /*=============================================
        =            Contructores de la Clase          =
        =============================================*/
        public function __construct() {
        }
        /*=====  End of Contructores de la Clase  ======*/

        /*=============================================
        =            Metodos de la Clase              =
        =============================================*/
        public static function getConexion(){
            self::$cnx = Conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }

        //Codigo para cargar el Select de productos
        public static function cargarProductos() {
            $sql= "select id_producto, nombre_producto from productos";
            try {
                self::getConexion();
                $stmt = self::$cnx->prepare($sql);
                $stmt->execute();
                self::desconectar();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ($result);
            } catch(PDOException $e) {
                echo 'Error al cargar productos: ' . $e->getMessage();
                return false;
            }
        }

        //Codigo para cargar el precio del producto
        public function obtenerPrecio($idProducto) {
            $sql = "select precio from productos where id_producto = :id_producto";
            try {
                self::getConexion();
                $stmt = self::$cnx->prepare($sql);
                $id_producto = $this->getIdProducto();
                $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                $stmt->execute();
                self::desconectar();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['precio'];
            } catch(PDOException $e) {
                echo 'Error al obtener precio: ' . $e->getMessage();
                return false;
            }
        }

        public function insertarVenta() {
            $sql = "insert into `ventas` (`id_producto`, `cantidad`, `total_venta`, `fecha_venta`)
            values(:id_producto, :cantidad, :total_venta, :fecha_venta);";
            try {
                self::getConexion();

                $idProducto = $this->getIdProducto();
                $cantidad = $this->getCantidad();
                $totalVenta = $this->getTotalVenta();
                $fechaVenta = $this->getFechaVenta();

                $stmt = self::$cnx->prepare($sql);

                $stmt->bindParam(':id_producto', $idProducto, PDO::PARAM_INT);
                $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                $stmt->bindParam(':total_venta', $totalVenta, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_venta', $fechaVenta, PDO::PARAM_STR);

                $stmt->execute();
                self::desconectar();
                return true;
            } catch(PDOException $e) {
                echo 'Error al insertar venta: ' . $e->getMessage();
                return false;
            }
        }
    }
?>