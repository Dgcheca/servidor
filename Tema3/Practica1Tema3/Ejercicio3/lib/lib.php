<?php

$productos = array (
    array("nombre" => "MANEATER", "descripcion" => "La experiencia definitiva como el mayor depredador de los mares.", "precio" => "37.95", "img" => "img/MANEATER.jpg", "id" => "1"),
    array("nombre" => "TALES OF ARISE", "descripcion" => "Desafía al destino que te retiene", "precio" => "64.95", "img" => "img/TALESOFARISE.jpg", "id" => "2"),
    array("nombre" => "FAR CRY 6 GOLD EDITION", "descripcion" => "Encarna a Dani Rojas, habitante de Yara que se convertirá en guerrillero para liberar su nación.", "precio" => "99.95", "img" => "img/FARCRY6GOLD.jpg", "id" => "3"),
    array("nombre" => "DEMON´S SOULS", "descripcion" => "Derrota a demonios monstruosos en exigentes combates", "precio" => "71.95", "img" => "img/DEMONSOULS.jpg", "id" => "4"),
    array("nombre" => "SPIDER-MAN MILES MORALES ULTIMATE EDITION", "descripcion" => "Asiste al acenso de Miles Morales", "precio" => "71.95", "img" => "img/MILESMORALES.jpg", "id" => "5"),
    array("nombre" => "MORTAL KOMBAT 11", "descripcion" => "¡La experiencia MK11 definitiva!", "precio" => "54.95", "img" => "img/MORTALKOMBAT11.jpg", "id" => "6")
    );

function buscar($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return array($producto['nombre'],$producto['precio']);
        }
    }
}
function encontrado($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }
    return false;
}
function update($id, $cant) {
    foreach($_SESSION['carrito'] as &$linea) {
        if ($linea['id'] == $id) {
            $linea['cant'] += $cant;   
            return $linea['cant'];      
        }
    }
}