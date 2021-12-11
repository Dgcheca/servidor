<?php

    abstract class Baraja{
        
        protected $mazo;

        public function __construct(){
            $this->mazo = array();
        }

        public abstract function repartirCarta();

        public function barajar(){
            shuffle($this->mazo);
        }

        public function listar(){
            foreach ($this->mazo as $key => $value) {
                echo $value;
                echo "<br>";
            }
        }
    }
    



?>