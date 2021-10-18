<?php
    session_start();


if ($_POST){
    if (isset($_POST['comprar'])){
        //echo "has comprado una tarjeta id= " . $_POST['id'];

        if (isset($_SESSION['carrito'])){
            array_unshift($_SESSION['carrito'], array("id" => $_POST['id'], "cant" => 1 ));
        } else {
            $_SESSION['carrito'] = array();
            array_unshift($_SESSION['carrito'], array("id" => $_POST['id'], "cant" => 1 ));
        }

        header("Location: index.php");
        exit;
    }
}


?>