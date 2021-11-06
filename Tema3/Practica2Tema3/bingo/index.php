<?php
session_start();
//session_destroy();

include "./lib.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
    <link href="estilos/estilo.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <?php
        //ESTO INICIA LAS VARIABLES DE LA SESION QUE VAMOS A USAR DE FORMA RECURRENTE
        if (!isset($_SESSION['cartera'])) {
            $_SESSION['cartera'] = 100;
        }
        if (!isset($_SESSION['enPartida'])) {
            $_SESSION['enPartida'] = false;
        }
        if (!isset($_SESSION['bingoGanador'])) {
            $_SESSION['bingoGanador'] = false;
        }
        if (!isset($_SESSION['jugadorGanador'])) {
            $_SESSION['jugadorGanador'] = false;
        }


        echo "<h1 class='cabecero'>BIENVENIDO AL BINGO</h1>";
        echo "<br>";
        echo "Tu Cartera: {$_SESSION['cartera']}€ ";
        echo "Coste de cada apuesta: 5€";
        echo "<br>";
        echo "Las apuestas se pagan a 5*oponente";



        if (($_SESSION['enPartida']) == true) { //Pintamos la partida

            //pintamos las bolas aparte
            echo "<div class='bolasmostradas'>";
            pintarBolas($_SESSION['bolasSalidas']);
            echo "</div>";


            echo "<div class='oponentes'>"; //pintamos el div de los cartones oponentes
            echo "<p>Cartones Oponentes</p>";

            for ($i = 0; $i < $_SESSION['numJugadores']; $i++) {
                echo "<div class='oponente'>"; //pintamos el div de cada carton individual

                $numjug = $i + 1;
                echo "<h2>Jugador {$numjug} </h2>";
                pintarCarton($_SESSION['jugadores'][$i], "oponente"); //AÑADIMOS OPONENTE AQUI Y JUGADOR EN LA OTRA Y CREAMOS LA FUNCION, NO TE OLVIDES

                echo "</div>";
            }


            echo "</div>"; //CIERRE DEL DIV OPONENTES
            echo "<hr>";
            echo "<div class='jugador'>";

            echo "<h2>Tu Cartón</h2>";

            pintarCarton($_SESSION['jugador'], "jugador");
            echo "</div>";
            
            if ($_SESSION['bingoGanador'] == true) {   //SI HAY UN GANADOR, ELIMINA EL BOTON DE NUEVA BOLA
                if ($_SESSION['jugadorGanador'] == true) { //SI EL GANADOR ERES TU, TE FELICITA Y TE SUMA LAS GANANCIAS
                    echo "<h2> Partida terminada! Has sacado bingo! Enhorabuena!</h2>";
                    $ganancias = $_SESSION['numJugadores'] * 5;
                    echo "Has ganado: $ganancias €";
                    $_SESSION['cartera'] += $ganancias;
                    echo "<form action='controlador.php' method='get'>";
                    echo "<button type='submit' name='reinicio'>Nueva Partida</button>";
                    echo "</form>";
                
                } else { //SI EL GANADOR ES OTRO, TE RESTA LA APUESTA
                    echo "<h2> Partida terminada! Alguien a sacado bingo!</h2>";
                    echo "<form action='controlador.php' method='get'>";
                    echo "<button type='submit' name='reinicio'>Nueva Partida</button>";
                    echo "</form>";
                    $_SESSION['cartera'] -= 5;
                }
            } else { //BOTONES DE NUEVA BOLA Y ABANDONAR LA PARTIDA
                echo "<form action='controlador.php' method='get'>";
                echo "<button type='submit' name='bola'>Nueva Bola</button>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<button type='submit' name='reinicio'>Abandonar Partida (solo pruebas)</button>";
                echo "</form>";
            }
        } else {
            //Pinto el formulario de nueva partida

            echo ' <div class="card">';

            echo   " <form class='form-signin m-3' action='controlador.php' method='get'>";
            echo       " <label><h1>Número de Oponentes</h1></label>";
            echo       "<input type='number' min='2' max='4' name='jugadores'>";
            echo       "<button class='btn btn-primary' type='submit' name='nueva'>Nueva Partida</button>";
            echo   "</form>";
            echo "</div>";
        }
        ?>
    </div>
    <!--CIERRE DEL DIV CONTAINER -->
</body>

</html>