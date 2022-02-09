<?php

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
                ControladorCripto::pintarInicio();
            }
        }
    }
    if ($_POST){
        if(isset($_POST["accion"])){
            if($_POST["accion"] == "empezar"){
                ControladorGenerador::pintarRazas();
            }
            if($_POST["accion"] == "verdatos"){
                ControladorGenerador::pintarDatos($_POST["id"]);
            }
            if($_POST["accion"] == "elegirRaza"){
                ControladorGenerador::guardarRaza($_POST["id"], $_POST["url"]);
                
            }
            if($_POST["accion"] == "verClases"){
                ControladorGenerador::pintarClases();
            }           
            if($_POST["accion"] == "verDatosClase"){
                ControladorGenerador::pintarDatosClase($_POST["id"]);
            }
            if($_POST["accion"] == "elegirClase"){
                ControladorGenerador::guardarClase($_POST["id"],$_POST["url"]);
            }
            if($_POST["accion"] == "terminar"){
                ControladorGenerador::guardarPersonaje($_POST["nombrepj"]);
            }
            if($_POST["accion"] == "verhistorial"){
                ControladorGenerador::verHistorialPersonajes();
            }

            
        }
    }



?>