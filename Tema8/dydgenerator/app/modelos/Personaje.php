<?php

    class Personaje {
        private $nombre;
        private $raza;
        private $clase;

        public function __construct($id = "", $nombre="",$raza="",$clase=""){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->raza=$raza;
            $this->clase = $clase;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of raza
         */ 
        public function getRaza()
        {
                return $this->raza;
        }

        /**
         * Set the value of raza
         *
         * @return  self
         */ 
        public function setRaza($raza)
        {
                $this->raza = $raza;

                return $this;
        }

        /**
         * Get the value of clase
         */ 
        public function getClase()
        {
                return $this->clase;
        }

        /**
         * Set the value of clase
         *
         * @return  self
         */ 
        public function setClase($clase)
        {
                $this->clase = $clase;

                return $this;
        }
    }
