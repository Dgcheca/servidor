<?php

    class Carta {
        private $palo;
        private $figura;

        public function __construct($palo, $figura){
            $this->palo = $palo;
            $this->figura = $figura;
        }
        
        public function __toString(){
            return $this->getPalo().$this->getFigura();
        }

        public function getValor(){
            $figura = $this->getFigura();
            $valor = 0;
            if ($figura >= 2 && $figura <=10) {
                $valor = $figura;
            } else if ($figura == "Jota" || $figura == "Reina" || $figura == "Rey") {
               $valor = 10;
            } else {
                $valor = 1;
            }
            return $valor;
        }
        /**
         * Get the value of palo
         */ 
        public function getPalo()
        {
                return $this->palo;
        }

        /**
         * Set the value of palo
         *
         * @return  self
         */ 
        public function setPalo($palo)
        {
                $this->palo = $palo;

                return $this;
        }

        /**
         * Get the value of figura
         */ 
        public function getFigura()
        {
                return $this->figura;
        }

        /**
         * Set the value of figura
         *
         * @return  self
         */ 
        public function setFigura($figura)
        {
                $this->figura = $figura;

                return $this;
        }
    }


?>