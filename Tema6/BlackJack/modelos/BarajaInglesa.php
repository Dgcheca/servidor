<?php

    class BarajaInglesa extends Baraja{
        private static $palos = ["Corazones","Diamantes","Picas","Treboles"];
        private static $figuras = ["As",2,3,4,5,6,7,8,9,10,"jota","reina","rey"];

        public function __construct(){
            parent::__construct();
            $this->generarMazo($this->mazo);
        }
        public function repartirCarta(){
            shuffle($this->mazo);
            return array_pop($this->mazo);
        }

        private function generarMazo($mazo){
            foreach (self::$palos as $palo) {
                foreach (self::$figuras as $figura) {
                    $carta = new Carta($palo,$figura);
                    array_push($this->mazo,$carta);
                }
            }
            return $mazo;
        }
    }


?>