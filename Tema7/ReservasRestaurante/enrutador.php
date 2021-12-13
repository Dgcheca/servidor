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
                ControladorReservas::mostrarReservasHoy();
            }
            if ($_REQUEST['accion'] == "reservasPorFecha") {
                ControladorReservas::buscarReservasFecha();
            }
            if ($_REQUEST['accion'] == "buscarReservas") {
                ControladorReservas::buscarEnReservas();
            }
            if ($_REQUEST['accion'] == "editarReserva") {
                ControladorReservas::editarReserva();
            }
            if ($_REQUEST['accion'] == "cancelarReserva") {
                ControladorReservas::cancelarReserva();
            }
            if ($_REQUEST['accion'] == "nuevaReserva") {
                ControladorReservas::nuevaReservaForm();
            }
            if ($_REQUEST['accion'] == "insertarReserva") {
                ControladorReservas::insertarReserva();
            }
        }
    }