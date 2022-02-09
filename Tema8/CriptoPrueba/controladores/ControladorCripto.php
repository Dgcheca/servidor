<?php
    class ControladorCripto{

        static function pintarInicio() {
            VistaCripto::Render();
        }
        static function pintarDatos() {
            $url = "http://daniservidor.herokuapp.com/Tema8/CriptoApi/api/cripto";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaGenerador::renderRazas($respPHP->results);
            }
        }


        


    }


?>