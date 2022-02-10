<?php
    class ControladorCripto{

        static function pintarInicio() {
            VistaCripto::Render();
        }
        static function pintarDatos() {
            $url = "http:\\localhost:3000/api/cripto";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaCripto::renderCriptos($respPHP->results);
            }
        }


        


    }


?>