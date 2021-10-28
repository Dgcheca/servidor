<?php
session_start();


if ($_GET) {
    
    $juegos=array();
    
    if (isset($_GET["switchrol"])) {
       array_push($juegos, "rol");
    }
    if (isset($_GET["switchestrategia"])) {
        array_push($juegos, "estrategia");
    }
    if (isset($_GET["switchshoters"])) {
        array_push($juegos, "shoters");
    }
    if (isset($_GET["switchrpg"])) {
        array_push($juegos, "rpg");
    }
    if (isset($_GET["switchgestionsimulacion"])) {
        array_push($juegos, "gestionsimulacion");
    }
    if (isset($_GET["switchcartas"])) {
        array_push($juegos, "cartas");
    }
    if (isset($_GET["switchmultijugador"])) {
        array_push($juegos, "multi");
    }
    if (isset($_GET["switchmasivos"])) {
        array_push($juegos, "masivos");
    }
}

    $valor = implode("|",$juegos);
    $nombre = 'miCookie';
    $expiracion = time() + (60 * 2);
    $ruta = 'cookies/';
    $dominio = "localhost";
    $seguridad = false;
    $solohttp = true;        
    setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp);

    header("Location: index.php");
    exit;
?>
