<?php
    class ControladorPartida { 
        public static function pintarPortada(){ //PINTAMOS LA PORTADA DEL JUEGO
            VistaPartida::render();
        }
        
        public static function iniciarPartida(){
            if (isset($_SESSION['partida'])) { //SI YA HABIA PARTIDA INICIADA
                unset($_SESSION['partida']); // HACEMOS UNSET DE PARTIDA Y GANADOR
                unset($_SESSION['ganador']);
            }
                $partida = new Partida(); //CREAMOS NUEVA PARTIDA (DENTRO SE CREAN LOS JUGADORES)
                $partida->repartirMano(); //REPARTIMOS LA MANO INICIAL (2 CARTAS)

                $_SESSION['partida'] = serialize($partida); //SERIALIZAMOS LA PARTIDA
                $_SESSION['crupier'] = "jugando"; //Y DECLARAMOS A LOS JUGADORES COMO "JUGANDO"
                $_SESSION['jugador'] = "jugando";
                VistaPartida::renderPartida(); //Y PINTAMOS LA PARTIDA
        }


        public static function pedirCarta(){
            if (isset($_SESSION['partida'])) {
                $partida = unserialize($_SESSION['partida']);
                $partida->comprobarValorCrupier();
                $partida->repartirCartas();
                $partida->comprobarValorJugador();
                $_SESSION['partida'] = serialize($partida);
                VistaPartida::renderPartida();
            }
        }

        public static function plantarse(){ //SI DECIDES PLANTARTE (O SI TE FUERZAN POR PASARTE)
            if (isset($_SESSION['partida'])) {
                if (!isset($_SESSION['ganador'])) {
                    $partida = unserialize($_SESSION['partida']);
                    $_SESSION['jugador']="plantado";
                    if ($_SESSION['crupier'] == "jugando") {
                        $partida = unserialize($_SESSION['partida']);
                        while ($_SESSION['crupier'] == "jugando") {
                            $partida->comprobarValorCrupier($partida);
                            $partida->repartirCartas();
                        }
                        $_SESSION['partida'] = serialize($partida);
                    }
                    $partida->comprobarGanador();
                }
                VistaPartida::renderPartida();  
            }
        }

        public static function comprobarGanador(){
            $partida = unserialize($_SESSION['partida']);
            $partida->comprobarGanador();
            
        }
    }
