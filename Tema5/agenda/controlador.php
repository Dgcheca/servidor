<?php
      include("modelo.php");
 //Función para filtrar los campos del formulario
 function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}


    if ($_GET) {
        //INSERTAR CONTACO
        if (isset($_GET['insertar'])) {
            $nombre = filtrado($_GET['nombre']);
            $apellidos = filtrado($_GET['apellidos']);
            $email = filtrado($_GET['email']);
            $movil = filtrado($_GET['movil']);
            
            if (strlen($apellidos == 0)) {
                $apellidos = "";
            }
               
            if (strlen($email == 0)) {
                $email = "";
            }
               

            insertarContacto($nombre,$apellidos,$email,$movil);
            header("Location: agenda.php");
            exit;
        }

        //BORRAR CONTACTO
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == "borrar") {
                $id = filtrado($_GET['id']);
                borrarContacto($id);
                    
                }
                header("Location: agenda.php");
                exit;
            }
        

        //BORRAR TODOS CONTACTOS
        if (isset($_GET['borrarTodo'])) {
            borrarTodos();
            header("Location: agenda.php");
            exit;
        }


    }
