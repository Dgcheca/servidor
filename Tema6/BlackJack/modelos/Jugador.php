<?php

    class Jugador{

        private $mano;

        public function __construct(){
            $this->mano = array();
        }

        public function nuevaCarta($Carta){
            array_push($this->mano,$Carta);
        }

        public function __toString(){
            var_dump($this->mano); //POR TERMINAR-----------------------------------------------------------------------------------------------
        }

        public function valorMano(){
            $valorTotal = 0;
            $ases = 0;
            foreach ($this->mano as $value) { //LOS VALORES LOS COGE NORMALMENTE DEL GETVALOR
                if ($value->getValor() == 1) { //SI ES UN AS, LO GUARDA PARA EL FINAL
                    $ases ++;
                } else {
                    $valorTotal += $value->getValor();
                }
            }
            if ($ases > 0) { //SI HEMOS GUARDADO AL MENOS UN AS COMPROBAMOS EL VALOR
                for ($i=0; $i < $ases; $i++) { //POR CADA AS GUARDADO HACEMOS LA COMPROBACION
                    if (($valorTotal + 11) > 21) { //SI AL SUMARLE 11 NOS PASAMOS DE 21
                        $valorTotal += 1; //LE SUMAMOS SOLO 1
                    } else {
                        $valorTotal += 11; //Y SI NO NOS PASAMOS, LE SUMAMOS 11
                    }
                }
            }
            return $valorTotal;
        }

        /**
         * Get the value of mano
         */ 
        public function getMano()
        {
                return $this->mano;
        }

        /**
         * Set the value of mano
         *
         * @return  self
         */ 
        public function setMano($mano)
        {
                $this->mano = $mano;

                return $this;
        }
    }


?>