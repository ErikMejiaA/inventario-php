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
            
            try {
                $stmt -> execute($data);
                $response = [[
                    'id_country' => self :: $conn -> lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'name_country' => $data['name_country']
                ]]; 
            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e -> getMessage();
            }

            return $response;
            
        }

        //Cargamos todos los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_country, name_country FROM countries";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $miSgav = $stmt -> fetchAll(\PDO :: FETCH_ASSOC);
            return $miSgav;
        } 

        //funcion para borrar datos de la base de datos
        public function deleteData($id) {
            $sql = "DELETE FROM countries WHERE id_country = :id";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data) {
            $sql = "UPDATE countries SET name_country = :name_country WHERE id_country = :id";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':name_country', $data['name_country']);
            $stmt -> bindParam(':id', $data['id_country']);
            $stmt -> execute();
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