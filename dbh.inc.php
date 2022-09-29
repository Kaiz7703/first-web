<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=thongtin", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                                      
    }
    catch(PDOException $e){
        echo "Conection failed: ".$e -> getMessage;
    }         
?>
