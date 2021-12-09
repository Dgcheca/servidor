<?php

    class Partida{
        private $jugador;
        private $crupier;
        private $baraja;

        public function __construct(){
            $this->jugador = new Jugador();
            $this->crupier = new Jugador();
            $this->baraja = new BarajaInglesa;
        }

        public function repartirMano(){ //REPARTE LA MANO INICIAL, 2 CARTAS PARA CADA UNO
                $this->crupier->nuevaCarta($this->baraja->repartirCarta());
                $this->crupier->nuevaCarta($this->baraja->repartirCarta());

                $this->jugador->nuevaCarta($this->baraja->repartirCarta());
                $this->jugador->nuevaCarta($this->baraja->repartirCarta());
        }

        public function comprobarValorCrupier(){ //COMPRUEBA EL VALOR DE LA MANO DEL CRUPIER
                if ($this->crupier->valorMano() >=17) {//SI ES IGUAL O MAYOR A 17 YA NO PUEDE PEDIR MAS (SE PLANTA)
                        $_SESSION['crupier'] = "plantado";
                }
        }
        public function comprobarValorJugador(){//COMPRUEBA EL VALOR DE LA MANO DEL JUGADOR
                if ($this->jugador->valorMano() >21) {//SI YA TE HAS PASADO DE 21 TE PLANTA AUTOMATICAMENTE Y RESUELVE EL JUEGO
                        $_SESSION['jugador'] = "plantado";
                        $this->comprobarGanador();
                }
        }
        
        public function repartirCartas(){ //COMPRUEBA SI CADA JUGADOR ESTA JUGANDO O PLANTADO
                //Y LE REPARTE UNA CARTA USANDO LA FUNCION DE BARAJA
                if ($_SESSION['jugador'] == "jugando") {
                        $this->jugador->nuevaCarta($this->baraja->repartirCarta());
                }
                
                if ($_SESSION['crupier'] == "jugando") {
                        $this->crupier->nuevaCarta($this->baraja->repartirCarta());
                }
        }

        public function comprobarGanador(){
                $valorCrupier = $this->crupier->valorMano();
                $valorJugador = $this->jugador->valorMano();

                if ($valorCrupier > 21 && $valorJugador <=21) { //SI EL CRUPIER SE PASA Y EL JUGADOR NO
                        $_SESSION['ganador'] = 'jugador'; //GANA EL JUGADOR
                } else if ($valorJugador > 21) { //SI EL JUGADOR SE PASA, HAGA LO QUE HAGA EL CRUPIER
                        $_SESSION['ganador'] = 'crupier'; //GANA EL CRUPIER
                } else { //SI NADIE SE PASA DE 21...
                     
                        if ($valorCrupier > $valorJugador) { //SI EL VALOR DE CRUPIER ES MAYOR QUE EL DE JUGADOR
                                $_SESSION['ganador'] = 'crupier'; //GANA EL CRUPIER
                        } else if ($valorCrupier < $valorJugador) { //SI EL VALOR DEL JUGADOR ES MAYOR QUE EL DEL CRUPIER
                                $_SESSION['ganador'] = 'jugador'; //GANA EL JUGADOR
                        } else { //SI HAY EMPATE EN EL VALOR...
                                if (((count($this->crupier->getMano()) == 2) && ($this->crupier->valorMano() == 21)) 
                                && ((count($this->jugador->getMano()) == 2) && ($this->jugador->valorMano() == 21)))  { 
                                        //EN EL TREMENDO CASO DE QUE LOS DOS TENGAN 21 NATURALES CON 2 CARTAS, SE DECLARA EMPATE
                                        $_SESSION['ganador'] = 'empate';//EMPATE
                                }
                                else if(((count($this->crupier->getMano()) == 2) && ($this->crupier->valorMano() == 21))){
                                        //EN EL CASO DE QUE EL CRUPIER TENGA UN 21 CON 2 CARTAS, GANA EL CRUPIER
                                        $_SESSION['ganador'] = 'crupier';//GANA EL CRUPIER  
                                }  else if(((count($this->jugador->getMano()) == 2) && ($this->jugador->valorMano() == 21))){
                                        //EN EL CASO DE QUE EL JUGADOR TENGA UN 21 CON 2 CARTAS, GANA EL JUGADOR
                                        $_SESSION['ganador'] = 'jugador';//GANA EL JUGADOR
                                } else {//SI EL VALOR NO ES 21, LA CANTIDAD DE CARTAS NO IMPORTA, CUALQUIER OTRO EMPATE SE DECLARA EMPATE
                                        $_SESSION['ganador'] = 'empate';//EMPATE
                                }
                        }
                }
        }

        //--------------------------GETTER Y SETTERS-------------------------------------
        /**
         * Get the value of jugador
         */ 
        public function getJugador()
        {
                return $this->jugador;
        }

        /**
         * Set the value of jugador
         *
         * @return  self
         */ 
        public function setJugador($jugador)
        {
                $this->jugador = $jugador;

                return $this;
        }

        /**
         * Get the value of crupier
         */ 
        public function getCrupier()
        {
                return $this->crupier;
        }

        /**
         * Set the value of crupier
         *
         * @return  self
         */ 
        public function setCrupier($crupier)
        {
                $this->crupier = $crupier;

                return $this;
        }

        /**
         * Get the value of baraja
         */ 
        public function getBaraja()
        {
                return $this->baraja;
        }

        /**
         * Set the value of baraja
         *
         * @return  self
         */ 
        public function setBaraja($baraja)
        {
                $this->baraja = $baraja;

                return $this;
        }
    }
