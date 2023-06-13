<?php 
    require_once 'vendor/autoload.php';
    use App\Database; // se llama la clase Database

    $db = new Database();
    $conn = $db -> getConnection('mysql'); // se hace la comunicacion con MySql

?>