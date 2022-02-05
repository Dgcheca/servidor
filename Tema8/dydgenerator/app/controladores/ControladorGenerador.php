<?php

    class ControladorGenerador {
        public static function pintarInicio(){
            VistaGenerador::render();
        }
        public static function pintarOpciones(){
            $arrayTotal = array();
            $url = "https://www.dnd5eapi.co/api/races";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                foreach ($respPHP->results as $consulta) {
                    $nuevaconsulta = "https://www.dnd5eapi.co" . $consulta->url;
                    $res = file_get_contents($nuevaconsulta, false);
                    if ($res === false) {
                        echo "Error haciendo petición";
                        exit;
                    } else {
                        array_push($arrayTotal, json_decode($res)); //PASAMOS EL JSON A OBJETO
                    }
                }
                VistaGenerador::renderOpciones($arrayTotal);
            }
        }
    }
    