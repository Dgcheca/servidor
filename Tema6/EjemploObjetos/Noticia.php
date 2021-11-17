<?php

    class Noticia{
        private $encabezado;
    

    public function __construct($encabezado) {
        $this->$encabezado; 
    }


        /**
         * Get the value of encabezado
         */ 
        public function getEncabezado()
        {
                return $this->encabezado;
        }

        /**
         * Set the value of encabezado
         *
         * @return  self
         */ 
        public function setEncabezado($encabezado)
        {
                $this->encabezado = $encabezado;

                return $this;
        }
    }
?>