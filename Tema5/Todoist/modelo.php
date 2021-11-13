<?php

//ABRIR CONEXION A BASE DE DATOS
$dbname = 'prueba';
$user = 'DGCheca';
$password = 'jaroso';

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo $e->getMessage();
}




?>