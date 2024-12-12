<?php
    require_once '../config/Conexion.php';
    class graficoModel extends Conexion {
        /*=============================================
        =            Atributos de la Clase            =
        =============================================*/
        protected static $cnx;
        /*=====  End of Atributos de la Clase  ======*/

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
        public static function cargarGrafico() {
            $sql = "select p.nombre_producto, sum(v.cantidad) as cantidad from ventas v join productos p on v.id_producto = p.id_producto group by v.id_producto, p.nombre_producto order by cantidad desc limit 5;";
            try {
                self::getConexion();
                $stmt = self::$cnx->prepare($sql);
                $stmt->execute();
                self::desconectar();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch(PDOException $e) {
                echo 'Error al cargar ventas: ' . $e->getMessage();
                return false;
            }
        }

    }
?>