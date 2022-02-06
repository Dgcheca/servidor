<?php

    class ControladorGenerador {
        public static function pintarInicio(){
            VistaGenerador::render();
        }
        public static function pintarRazas(){
            $url = "https://www.dnd5eapi.co/api/races";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaGenerador::renderRazas($respPHP->results);
            }
        }

        public static function pintarDatos($id){
            $url = "https://www.dnd5eapi.co{$id}";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaGenerador::renderDatosRaza($respPHP);
            }
        }

        public static function guardarRaza($id,$url){
            $_SESSION["raza"]=$id;
            $_SESSION["urlraza"]=$url;
            self::pintarClases();
        }
        public static function pintarClases(){
            $url = "https://www.dnd5eapi.co/api/classes";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaGenerador::renderClases($respPHP->results);
            }
          
        }

        public static function pintarDatosClase($id){
            $url = "https://www.dnd5eapi.co{$id}";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaGenerador::renderDatosClase($respPHP);
            }
        }

        public static function guardarClase($id,$url){
            $_SESSION["clase"]=$id;
            $_SESSION["urlclase"]=$url;
            VistaGenerador::pintarElegirNombre();
        }


        public static function guardarPersonaje($nomb){
            $nombre = $nomb;
            $raza = $_SESSION['raza'];
            $clase = $_SESSION['clase'];
            PersonajeBD::guardarPersonaje($nombre, $raza, $clase);
            VistaGenerador::pintarPersonajeTerminado();
        }

        public static function verHistorialPersonajes(){
            $listaPersonajes = PersonajeBD::cargarPersonajes();
            VistaGenerador::pintarHistorialPersonajes($listaPersonajes);
        }
      
    }
    