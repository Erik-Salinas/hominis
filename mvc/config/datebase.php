<?php
//*Se establecen las  credenciales de la conexión de una base de datos
    $host= 'localhost';
    $dbname = 'hominis';
    $username = 'root';
    $password = '';
    
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error". $e->getMessage();
    }
    
?>