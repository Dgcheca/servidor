<?php

function conectar()
{
    //ABRIR CONEXION A BASE DE DATOS
    $dbname = 'agenda';
    $user = 'DGCheca';
    $password = 'jaroso';
    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}



function leerArchivo()
{
    $dbh = conectar();
    $stmt = $dbh->prepare("SELECT * FROM contactos");
    $stmt->execute();
    $contactos = $stmt->fetchAll(PDO::FETCH_BOTH);
    //Cerrar conexión
    $dbh = null;
    return $contactos;
}

function insertarContacto($nombre, $apellidos, $email, $movil){
    $dbh = conectar();

    try {
        $stmt = $dbh->prepare("INSERT INTO contactos (nombre, apellidos, email, movil) VALUES (?, ?, ?, ?)");
        
        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $apellidos);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $movil);

        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}

function borrarContacto($id) {
    $dbh = conectar();

    try {
        $stmt = $dbh->prepare("DELETE FROM contactos WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;

}

function borrarTodos() {
    $dbh = conectar();
    try {
        $stmt = $dbh->prepare("DELETE FROM contactos");
        $stmt->execute();

        $stmt = $dbh->prepare("ALTER TABLE contactos AUTO_INCREMENT = 1");
        $stmt->execute();
        
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;

}


