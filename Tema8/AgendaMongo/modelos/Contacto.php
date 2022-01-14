<?php

    class Contacto {
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $movil;

        public function __construct($id="",$nombre="",$apellidos="",$email="",$movil=""){
            $this->id = $id;
            $this->nombre=$nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->movil = $movil;
        }


        /**
         * Get the value of apellidos
         */ 
        public function getApellidos()
        {
                return $this->apellidos;
        }

        /**
         * Set the value of apellidos
         *
         * @return  self
         */ 
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;

                return $this;
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
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of movil
         */ 
        public function getMovil()
        {
                return $this->movil;
        }

        /**
         * Set the value of movil
         *
         * @return  self
         */ 
        public function setMovil($movil)
        {
                $this->movil = $movil;

                return $this;
        }
    }
