<?php
session_start();

include("lib.php");

    if ($_POST) {
        if (isset($_POST['comprar'])) {
            if (isset($_SESSION['carrito'])) { 
                if (encontrado($_POST['id'],$_SESSION['carrito'])) {
                    update($_POST['id'],$_POST['cantidad'],$_SESSION['carrito']);
                } else {      
                    array_unshift($_SESSION['carrito'], array("id" =>$_POST['id'], "cant" => $_POST['cantidad'] ));
                }
            } else {
                $_SESSION['carrito'] = array(); 
                array_unshift($_SESSION['carrito'], array("id" =>$_POST['id'], "cant" => $_POST['cantidad'] ));
            }
            header("Location: index.php",false);
            exit;
        }
        if (isset($_POST['nuevoProducto'])) {
            $nombre = filtrado($_POST['nombreProducto']);
            $precio = filtrado($_POST['precio']);
            $descripcion = filtrado($_POST['descripcion']);
            //Imagen del producto
            $errores="";
            $destino="";
            if ($_FILES["imagen"]["size"] == 0) {
                $errores .= "El archivo no ha llegado correctamente o es mayor a 4MB"; 
            } else if($_FILES["imagen"]["size"] > (3 * 1024 * 1024)){ 
                $errores .= "El archivo demasiado grande, máximo 3MB";
            } else if($_FILES["imagen"]["type"] != 'image/jpeg') { //La extensión
                $errores .= "El archivo no es una imagen jpeg";
            } else { 
                //Nos podemos fiar sólo en parte, hay que comprobar el mime del archivo
                $mimereal = finfo_file(finfo_open(FILEINFO_MIME), $_FILES["imagen"]["tmp_name"]);
                //Lo comparo con los mime que me interesan en la aplicación
                
                if (strpos($mimereal, "image/jpeg") === false) {
                    $errores .= "Mime no valido";
                } else {
                    //Lo subimos a imgs/productos
                    $destino = "./img/products/" . $_FILES["imagen"]["name"]; 
                    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino)) { 
                        //echo "Archivo subido correctamente";

                        //Insertarmos en el archivo store.txt
                        $nombreImagen = explode(".",$_FILES['imagen']['name']);
                        insertarProducto($nombre,$precio,$descripcion,$nombreImagen[0]);

                        header("Location: index.php");
                        exit;
                    } else  { 
                        $errores .= "Fallo al cargar archivo";
                    } 
                }
        
        
            }
            echo $errores;
        }
    }
    if ($_GET) {
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == "borrar") {
                $ids = array_column($_SESSION['carrito'], 'id');
                $found_key = array_search($_GET['id'], $ids);
                unset($_SESSION['carrito'][$found_key]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                header("Location: verCarro.php",false);
                exit;
            }
        }
    }

    ?>