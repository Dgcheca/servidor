<?php
session_start();


if ($_POST) {
    if ($_SESSION['opcion1'] == 0 && $_SESSION['opcion2'] == 0) {
        $_SESSION['votos'] = 0;
    }
    if (isset($_POST['boton1'])) {
        $_SESSION['opcion1'] += 1;
        $_SESSION['votos'] += 1;
    }
    if (isset($_POST['boton2'])) {
        $_SESSION['opcion2'] += 1;
        $_SESSION['votos'] += 1;
    }
    if (isset($_POST['boton3'])) {
        session_destroy();
    }
}

header("Location: index.php");
exit;
