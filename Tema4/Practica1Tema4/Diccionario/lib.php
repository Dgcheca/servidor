<?php
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

function nuevaPalabra($palabra, $traduccion)
{
    $disponible = true;
    $palabras = leerArchivo();
    foreach ($palabras as $linea) {
        if (strtolower($linea[0]) == strtolower($palabra)) {
            $disponible = false;
            break;
        }
    }
    if ($disponible == true) {
        $nuevaPalabra = strtolower($palabra) . "," . strtolower($traduccion) . PHP_EOL;
        file_put_contents("diccionario.txt", $nuevaPalabra, FILE_APPEND | LOCK_EX);
    } else {
        header("Location: index.php?mensaje=Esa palabra ya esta registrada");
        exit;
    }
}


function borrarPalabra($palabra)
{
    $diccionario = leerArchivo();
    file_put_contents("diccionario.txt", "", LOCK_EX);
    foreach ($diccionario as $linea) {
        if ($linea[0] != $palabra) {
            $nuevaPalabra =  $linea[0] . "," . $linea[1];
            file_put_contents("diccionario.txt", $nuevaPalabra, FILE_APPEND | LOCK_EX);
        }
    }
}

function mostrarPalabra($palabra)
{
    $palabras = leerArchivo();
    asort($palabras);
    if ($palabra != "") {
        $resultado = array();
        foreach ($palabras as $value) {
            if (trim($value[0] == $palabra) || (trim($value[1])== $palabra)) {
                array_push($resultado, $value);
            }
        }
    } else {
        $resultado = $palabras;
    }
    return $resultado;
}

function leerArchivo()
{
    $palabras = array();
    $lineasFichero = file("diccionario.txt");
    foreach ($lineasFichero as $linea) {
        array_push($palabras,explode(",",$linea));
    }
    return $palabras;
}
