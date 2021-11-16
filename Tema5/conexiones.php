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
/*
// Prepare
$stmt = $dbh->prepare("INSERT INTO tareas (nombre, fecha_limite, prioridad) VALUES (?, ?, ?)");
// Bind
$stmt->bindValue(1, 'Lo mismo hecho en clase, tiene que estar para el proximo dia');
$stmt->bindValue(2, '2021-10-09');
$stmt->bindValue(3, '1');
// Excecute
$stmt->execute();
*/


//SELECT CON FETCHALL
$stmt = $dbh->prepare("SELECT * FROM tareas");
$stmt->execute();
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($tareas as $tarea){
    echo "ID: {$tarea['id']}" . "<br>";
    echo "NOMBRE: {$tarea['nombre']}" . "<br>";
    echo "FECHA: {$tarea['fecha_limite']}" . "<br>";
    echo "PRIORIDAD: {$tarea['prioridad']}" . "<br>";
}






    //CERAR CONEXION A BASE DE DATOS
    //$dbh = null;
