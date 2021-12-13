<?php

    class Reserva{
        
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $movil;
        private $fecha;
        private $turno;
        private $hora;
        private $nPersonas;
        private $estado;
        private $idMesa;

        public function __construct($id=0,$nombre="",$apellidos="",$email="",$movil="",$fecha="",$turno="",$hora="",$nPersonas="",$estado="",$idMesa=0){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->movil = $movil;
            $this->fecha = $fecha;
            $this->turno = $turno;
            $this->hora = $hora;
            $this->nPersonas = $nPersonas;
            $this->estado = $estado;
            $this->idMesa = $idMesa;
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

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of turno
         */ 
        public function getTurno()
        {
                return $this->turno;
        }

        /**
         * Set the value of turno
         *
         * @return  self
         */ 
        public function setTurno($turno)
        {
                $this->turno = $turno;

                return $this;
        }

        /**
         * Get the value of hora
         */ 
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Set the value of hora
         *
         * @return  self
         */ 
        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }

        /**
         * Get the value of nPersonas
         */ 
        public function getNPersonas()
        {
                return $this->nPersonas;
        }

        /**
         * Set the value of nPersonas
         *
         * @return  self
         */ 
        public function setNPersonas($nPersonas)
        {
                $this->nPersonas = $nPersonas;

                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of idMesa
         */ 
        public function getIdMesa()
        {
                return $this->idMesa;
        }

        /**
         * Set the value of idMesa
         *
         * @return  self
         */ 
        public function setIdMesa($idMesa)
        {
                $this->idMesa = $idMesa;

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
    }
    
?>