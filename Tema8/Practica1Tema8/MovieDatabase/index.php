<?php

header('Content-Type: application/json; charset=utf-8');

//Ejemplo GET api sin key
$url = "http://alpha-meme-maker.herokuapp.com/memes/22";
$resultado = file_get_contents($url, false);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}
?>