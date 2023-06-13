<?php 

    namespace Models;
    class Country {

        //definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_country', 'name_country'];
        private $id_country;
        private $name_country;

        public function __construct($args = [])
        {
            $this -> id_country = $args['id_country'] ?? '';
            $this -> name_country = $args['name_country'] ?? '';
        }

        //definimos la funcion para guardar los en la base de datos (insertar datos)
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO countries ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);

            
        }


        //acontinuacion se escribe la funcion de sanitizacion
        //para prevenir inyesion de cosigo SQL y caracteres especiales 
        public static function setConn($connBd) {
            self :: $conn = $connBd;
        }
        
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_country') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }

        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }
?>