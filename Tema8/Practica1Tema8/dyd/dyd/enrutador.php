<?php
session_start();
//session_destroy();
//---------------------------------------------------
//AUTOLOAD
function autocarga($clase){ 
    $ruta = "./controladores/$clase.php"; 
    if (file_exists($ruta)){ 
      include_once $ruta; 
    }

    $ruta = "./vistas/$clase.php"; 
    if (file_exists($ruta)){ 
        include_once $ruta; 
    }

    $ruta = "./modelos/$clase.php"; 
    if (file_exists($ruta)){ 
        include_once $ruta; 
    }
} 
spl_autoload_register("autocarga");
//FILTRADO
function filtrado($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
//PETICIONES
    if ($_GET){
        if(isset($_GET["accion"])){
            if($_GET["accion"]=="inicio"){
                //ControladorGenerador::pintarBusqueda();
            }
        }
    }
      
?>