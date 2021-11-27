<?php 
session_start();
//session_destroy();

    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    //AUTOLOAD
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

    if($_REQUEST){
        if(isset($_REQUEST['accion'])){
            if($_REQUEST['accion'] == "inicio"){
                ControladorAgenda::mostrarAgenda();   
            }
            if ($_REQUEST['accion'] == "borrarTodo") {
                ControladorAgenda::borrarTodo();
            }
            if ($_REQUEST['accion'] == "insertar") {
               ControladorAgenda::insertarContacto();
            }
            if ($_REQUEST['accion'] == "borrarContacto") {
                ControladorAgenda::borrarContacto();
            }
            if ($_REQUEST['accion'] == "editarContacto") {
            ControladorAgenda::editarContactoVista();
            }
            if ($_REQUEST['accion'] == "confirmarEditar") {
                ControladorAgenda::confirmarEditar();
            }
        }
       
    }
