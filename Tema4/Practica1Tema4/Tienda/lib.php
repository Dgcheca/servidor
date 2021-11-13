<?php
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

function buscar($id, $productos){
    foreach ($productos as $producto) {
        if ($producto[0] == $id) {
            return array($producto[1], $producto[2]);
        }
    }
}
function encontrado($id, $productos){
    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }
    return false;
}
function update($id, $cant){
    foreach ($_SESSION['carrito'] as &$linea) {
        if ($linea['id'] == $id) {
            $linea['cant'] += $cant;
            return $linea['cant'];
        }
    }
}
function leerArchivo()
{
    if (strlen(file_get_contents("store.txt") > 0)) {
        $productos = array();
        $archivo = explode("|",file_get_contents("store.txt"));
        foreach ($archivo as $linea) {
            array_push($productos, explode("@",$linea));
        }
    } else {
        $productos = "";
    }
    return $productos;
}

function insertarProducto($nombre, $precio, $descripcion, $img){
    $productos = leerArchivo();
    $mayor = 0;
    foreach ($productos as $producto) {
        if ($producto[0] > $mayor)
            $mayor = $producto[0];
    }
    if (strlen(file_get_contents("store.txt") > 0))
        $producto = "|" . ($mayor + 1) . "@" . $nombre . "@" . $precio . "@" . $img . "@" . $descripcion;
    else
        $producto = ($mayor + 1) . "@" . $nombre . "@" . $precio . "@" . $img . "@" . $descripcion;
    file_put_contents("store.txt", $producto, FILE_APPEND | LOCK_EX);
}
