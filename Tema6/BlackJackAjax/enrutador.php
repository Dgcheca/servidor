<?php
session_start();
//session_destroy();
//---------------------------------------------------
function autocarga($clase){ 
    $ruta = "./controladores/$clase.php"; 
    if (file_exists($ruta)){ 
      include_once $ruta; 
    }

    $ruta = "./modelos/$clase.php"; 
    if (file_exists($ruta)){ 
        include_once $ruta; 
    }

    $ruta = "./vistas/$clase.php"; 
    if (file_exists($ruta)){ 
        include_once $ruta; 
    }
} 
spl_autoload_register("autocarga");

function filtrado($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
//----------------------------------------------------

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {
            if ($_REQUEST['accion'] == "inicio") {
                ControladorPartida::pintarPortada();
            }
            if ($_REQUEST['accion'] == "nuevaPartida") {
                ControladorPartida::iniciarPartida();
            }
            if ($_REQUEST['accion'] == 'pedirCarta') {
                ControladorPartida::pedirCarta();
            }
            if ($_REQUEST['accion'] == 'plantarse') {
                ControladorPartida::plantarse();
            }
        }
    }
