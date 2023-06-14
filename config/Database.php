<?php 

    namespace App; //namespace es un contenedor de classes
    class Database {

        //definimos las variabales
        private $conn;
        protected static $settings = Array(

            "mysql" => Array(

                'driver' => 'mysql',
                'host' => 'localhost',
                //'host' => '172.16.48.210',
                'username' => 'root', 
                //'username' => 'campus',
                //'username' => 'apolo',
                'database' => 'sgavapp',
                'password' => '123456789',
                //'password' => 'campus2023', 
                //'password' => '@pol0Adm1n$', 
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'flags' => [
                    // Turn off persistent connections
                    \PDO::ATTR_PERSISTENT => false,
                    // Enable exceptions
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    // Emulate prepared statements
                    \PDO::ATTR_EMULATE_PREPARES => true,
                    // Set default fetch mode to array
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    // Set character set
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                ]
            ),

            "pgsql" => Array(

                'driver' => 'pgsql',
                'host' => 'localhost',
                //'host' => '172.16.48.210',
                'username' => 'postgres',
                //'username' => 'campers25',
                'database' => 'sgavapp',
                'password' => '123456789',
                //'password' => '123456',
                'flags' => [
                    // Turn off persistent connections
                    \PDO::ATTR_PERSISTENT => false,
                    // Enable exceptions
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    // Set default fetch mode to array
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    // Set character set
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ]
            )

        );

        public function __construct($args = [])
        {
            $this -> conn = $args['conn'] ?? null;
        }

        // Se establece la conexion con la base de datos
        public function getConnection($dbkey) {
            $dbConfig = self::$settings[$dbkey];
            $this -> conn = null;
            $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";

            try {

                $this -> conn = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['flags']);
                echo 'OKKKKKKKK';

            } catch (\PDOException $exception) {
                $error = [[
                    'error' => $exception -> getMessage(),
                    'message' => 'Error al momento de establecer conexion'
                ]];
                return $error;

            }
            return $this -> conn;
        }
    }
?>