<?php
session_start();

include("./lib/lib.php");

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