<?php
    session_start();

    include "./lib.php";

    //NUEVA PARTIDA
    if (isset($_GET['nueva'])) {

        //Número de jugadores
        $_SESSION['numJugadores'] = $_GET['jugadores'];

        

        //Iniciar bolas
        $_SESSION['bingo'] = array();
        for($i=0;$i<100;$i++) {
            array_push($_SESSION['bingo'], $i);          
        }
        shuffle($_SESSION['bingo']);
        
        //Inicio Cartones de los jugadores
        $_SESSION['jugadores'] = array();
        //Generar cartones de los jugadores
        $numJugadores = $_SESSION['numJugadores'];
        for($k=0;$k<$numJugadores;$k++) {

            $carton = array(
                array(),
                array(),
                array()
            );
            for($j=0; $j<3;$j++){
                for($i=0;$i<5;$i++) {
                    $carton[$j][$i] = array(rand(1,99),false);        
                }
            
                
            }
            //$_SESSION['jugadores'][$j] = $carton;
            array_push($_SESSION['jugadores'],$carton);
        }

        //Generar cartón jugador
        $carton = array(
            array(),
            array(),
            array()
        );
        for($j=0; $j<3;$j++){
            for($i=0;$i<5;$i++) {
                $carton[$j][$i] = array(rand(1,99),false);        
            }
        }
        $_SESSION['jugador'] = $carton;

        //Iniciar bolas salidas
        $_SESSION['bolasSalidas'] = array();

        $_SESSION['enPartida'] = true;

        header("Location: index.php");
        exit;
    }



    //Sacar bola
    if (isset($_GET['bola'])) {

        $bola = array_pop($_SESSION['bingo']);
        array_push($_SESSION['bolasSalidas'], $bola);

        //Marcamos la bola en los cartones de los jugadores
        $numJugadores = $_SESSION['numJugadores'];
        for($j=0;$j<$numJugadores;$j++) {
            marcarBola($bola, $_SESSION['jugadores'][$j] );
        }
        //Marcamos la bola en el cartón de nuestro jugador
        marcarBola($bola, $_SESSION['jugador'] );

        header("Location: index.php");
        exit;

    }

    if (isset($_GET['reinicio'])) { //EN CASO DE QUE REINICIEMOS PARTIDA, PONEMOS EN FALSE TODAS LAS VARIABLES QUE HAYAMOS PUESTO A TRUE
        $_SESSION['enPartida'] = false;
        if ($_SESSION['jugadorGanador'] == true) {
            $_SESSION['jugadorGanador'] = false;
        }
        if ($_SESSION['bingoGanador'] == true) {
            $_SESSION['bingoGanador'] = false;
        }
        header("Location: index.php");
        exit;
    }
