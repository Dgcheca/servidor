<?php
session_start();
include "lib.php";


if ($_POST) {
    if (isset($_POST['nuevaPalabra'])) {
        $palabra = filtrado($_POST['palabra']);
        $traduccion = filtrado($_POST['traduccion']);
        nuevaPalabra($palabra, $traduccion);
        header("Location: index.php");
        exit;
    }
    if (isset($_POST['borrarPalabra'])) {
        $palabra = filtrado($_POST['palabra']);
        borrarPalabra($palabra);
        header("Location: index.php");
        exit;
    }
    if (isset($_POST['buscarPalabra'])) {
        $palabra = strtolower(filtrado($_POST['palabra']));
        $_SESSION['busqueda'] =  mostrarPalabra($palabra);
        header("Location: index.php");
        exit;
    }
}



if ($_GET) {
    if (isset($_GET['busqueda'])) {
        if ($_GET['busqueda'] == "mostrarTodo") {
            $_SESSION['busqueda'] =  mostrarPalabra("");
            header("Location: index.php");
            exit;
        }
        if ($_GET['busqueda'] == "reinicio") {
            if (isset($_SESSION['busqueda'])) {
                unset($_SESSION['busqueda']);
            }
            header("Location: index.php");
            exit;
        }
        if ($_GET['busqueda'] == "palabra") {
            if (isset($_SESSION['busqueda'])) {
                unset($_SESSION['busqueda']);
            }
            header("Location: index.php");
            exit;
        }
    }
}
