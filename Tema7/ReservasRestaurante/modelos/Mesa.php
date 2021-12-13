<?php

    class Mesa{
        private $id;
        private $capacidad;

        public function __construct($id=0,$capacidad=0){
            $this->id = $id;
            $this->capacidad = $capacidad;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of capacidad
         */ 
        public function getCapacidad()
        {
                return $this->capacidad;
        }

        /**
         * Set the value of capacidad
         *
         * @return  self
         */ 
        public function setCapacidad($capacidad)
        {
                $this->capacidad = $capacidad;

                return $this;
        }
    }
    



?>