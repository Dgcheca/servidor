<?php
session_start();
//session_destroy();
include "lib.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
    <link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <main>
        <div class="ahorcadoPortada">
            <h1>JUEGO DEL AHORCADO</h1>

            <?php
            if (isset($_SESSION['palabra'])) { //SI YA SE HA ELEGIDO PALABRA, ENTRAMOS EN PARTIDA
                if ($_SESSION['errores'] <= 6) { //MIENTRAS TENGAS MENOS DE 6 ERRORES
                    if ($_SESSION['palabra'] == $_SESSION['palabraAdivinar']) { //SI LA PALABRA A ADIVINAR YA SE HA CONVERTIDO ENTERA EN LA ORIGINAL, HAS GANADO
                        echo "<div class='mensajeVictoria'>";
                        echo "<h1>HAS GANADO!</h1>";
                        echo "<form action='controlador.php' method='get'>";
                        echo "<button class='nuevaPartida'  type='submit' name='nuevaPartida'>Nueva Partida</button>";
                        echo "</form>";
                        echo "</div>";
                    } else {
                        echo "<div class='ahorcadoJugando'>";
                        echo "<p>La palabra a adivinar es: </p>";
                        for ($i = 0; $i < strlen($_SESSION['palabraAdivinar']); $i++) { //PINTAMOS LA PALABRA A ADIVINAR DEJANDO UN HUECO ENTRE LETRAS PARA DEJARLO MAS CLARO
                            echo $_SESSION['palabraAdivinar'][$i] . " ";
                        }
                        echo "<p>Elige una letra: </p>";
                        echo "<form action='controlador.php' method='get'>";


                        for ($i = 0; $i < count($_SESSION['letras']); $i++) {
                            $letraBoton = $_SESSION['letras'][$i];
                            if (in_array($letraBoton, $_SESSION['usadas'])) { //SI LA LETRA A PINTAR ESTA EN EL ARRAY DE LAS USADAS, LAS PINTA DISABLED
                                echo "<input class='letra' disabled type='submit' name='letraPulsada' value='$letraBoton' />";
                            } else {
                                echo "<input class='letra' type='submit' name='letraPulsada' value='$letraBoton' />";
                            }
                            if ($i > 0 && $i % 9 == 0) {
                                echo "<br>";
                            }
                        }

                        echo "<div class='monigote'>";
                        echo "<img src='img/i{$_SESSION['errores']}.png' alt=''>";
                        echo "</div>";
                        echo "</form>";
                    }
                } else {
                    echo "<h1>HAS PERDIDO!</h1>";
                    echo "<div class='monigote'>";
                    echo "<img src='img/i7.png' alt=''>";
                    echo "</div>";
                    echo "<form action='controlador.php' method='get'>";
                    echo "<button class='nuevaPartida' type='submit' name='nuevaPartida'>Nueva Partida</button>";
                    echo "</form>";
                }

                echo "</div>";
            } else {
                //Si no hay una palabra escogida, pantalla de inicio
            ?>
                <div><img src="img/i0.png" alt=""></div>
            <?php
                echo "<form action='controlador.php' method='get'>";
                echo "<button class='nuevaPartida' type='submit' name='nuevaPartida'>Nueva Partida</button>";
                echo "</form>";
            }
            ?>

        </div>
    </main>
</body>

</html>