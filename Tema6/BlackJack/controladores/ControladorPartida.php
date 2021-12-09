<?php
    class ControladorPartida { 
        public static function pintarPortada(){ //PINTAMOS LA PORTADA DEL JUEGO
            VistaPartida::renderPortada();
        }
        public static function iniciarPartida(){
            if (!isset($_SESSION['partida'])) { //SI LA PARTIDA NO ESTA INICIADA
                $partida = new Partida(); //CREAMOS NUEVA PARTIDA (DENTRO SE CREAN LOS JUGADORES)
                $partida->repartirMano(); //REPARTIMOS LA MANO INICIAL (2 CARTAS)

                $_SESSION['partida'] = serialize($partida); //SERIALIZAMOS LA PARTIDA
                $_SESSION['crupier'] = "jugando"; //Y DECLARAMOS A LOS JUGADORES COMO "JUGANDO"
                $_SESSION['jugador'] = "jugando";
                VistaPartida::render(); //Y PINTAMOS LA PARTIDA
            } else if (isset($_SESSION['ganador'])){ //SI YA TENEMSO DEFINIDO UN GANADOR (O EMPATE)
                VistaPartida::renderFinal(); //PINTAMOS LA PANTALLA DE RESULTADOS
            } else {
                VistaPartida::render(); //EN CUALQUIER OTRO CASO, PINTAMOS LA MESA
            }
            
        }
        public static function abandonarPartida(){ //SI ABANDONAMOS LA PARTIDA VOLVEMOS A LA PORTADA
            unset($_SESSION['partida']); //Y HACEMOS UNSET DE PARTIDA Y GANADOR
            unset($_SESSION['ganador']);
            header ("Location: enrutador.php?accion=inicio"); //REDIRECCIONAMOS PARA EVITAR PROBLEMAS CON F5
        }

        //--------------------------------SE PUEDE MEJORAR ABAJO----------------------------------
        public static function pedirCarta(){
            $partida = unserialize($_SESSION['partida']);
            self::comprobarValorCrupier($partida);
            $partida->repartirCartas();
            self::comprobarValorJugador($partida);
            $_SESSION['partida'] = serialize($partida);
            header("Location:enrutador.php?accion=partida");
        }

        public static function comprobarValorCrupier($partida){
            $partida->comprobarValorCrupier();
        }
        public static function comprobarValorJugador($partida){
            $partida->comprobarValorJugador();
        }
        //--------------------------------SE PUEDE MEJORAR ARRIBA----------------------------------

        public static function plantarse(){ //SI DECIDES PLANTARTE (O SI TE FUERZAN POR PASARTE)
            $_SESSION['jugador']="plantado";
            if ($_SESSION['crupier'] == "jugando") {
                $partida = unserialize($_SESSION['partida']);
                while ($_SESSION['crupier'] == "jugando") {
                    self::comprobarValorCrupier($partida);
                    self::pedirCarta();
                }
            }
        }

        public static function comprobarGanador(){
            $partida = unserialize($_SESSION['partida']);
            $partida->comprobarGanador();
            header("Location:enrutador.php?accion=partida");
        }

        public static function nuevaPartida(){
            unset($_SESSION['partida']);
            unset($_SESSION['ganador']);
            header ("Location: enrutador.php?accion=partida"); //REDIRECCIONAMOS PARA EVITAR PROBLEMAS CON F5
        }
    }



?>