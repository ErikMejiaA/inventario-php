<?php 
    require_once 'vendor/autoload.php';
    use App\Database; // se llama la clase Database
    use Models\Country;

    $db = new Database();
    $conn = $db -> getConnection('mysql'); // se hace la comunicacion con MySql
    //asignar una conexion activa para todos los models que se crean 
    Country :: setConn($conn);
    

?>