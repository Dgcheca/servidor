<?php
session_start();

    foreach ($_Session['carrito'] as $lineaCarro) {
        echo $lineaCarro['id']." ".$lineaCarro['cantidad']. "<br>";
    }

    //para sacar los datos

    

?>