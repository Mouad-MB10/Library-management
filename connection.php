<?php
$servername="localhost";
$username="root";
$password="";
try {
    $pdo=new PDO("mysql:host=$servername;dbname=bibl",$username,$password);
    
} catch (PDOException $e) {
    echo "Connection failed".$e->getMessage();
}
?>