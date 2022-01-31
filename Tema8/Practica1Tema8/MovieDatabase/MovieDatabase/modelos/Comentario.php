<?php

    class Comentario {
        private $idserie;
        private $nick;
        private $nota;
        private $texto;

        public function __construct($idserie = "", $nick="",$nota="",$texto=""){
            $this->idserie = $idserie;
            $this->nick = $nick;
            $this->nota=$nota;
            $this->texto = $texto;
        }

        /**
         * Get the value of nick
         */ 
        public function getNick()
        {
                return $this->nick;
        }

        /**
         * Set the value of nick
         *
         * @return  self
         */ 
        public function setNick($nick)
        {
                $this->nick = $nick;

                return $this;
        }

        /**
         * Get the value of nota
         */ 
        public function getNota()
        {
                return $this->nota;
        }

        /**
         * Set the value of nota
         *
         * @return  self
         */ 
        public function setNota($nota)
        {
                $this->nota = $nota;

                return $this;
        }

        /**
         * Get the value of texto
         */ 
        public function getTexto()
        {
                return $this->texto;
        }

        /**
         * Set the value of texto
         *
         * @return  self
         */ 
        public function setTexto($texto)
        {
                $this->texto = $texto;

                return $this;
        }

        /**
         * Get the value of idserie
         */ 
        public function getIdserie()
        {
                return $this->idserie;
        }

        /**
         * Set the value of idserie
         *
         * @return  self
         */ 
        public function setIdserie($idserie)
        {
                $this->idserie = $idserie;

                return $this;
        }
    }