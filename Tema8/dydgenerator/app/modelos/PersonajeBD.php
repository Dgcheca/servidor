<?php 

use MongoDB\Client;
require 'vendor/autoload.php';

    class PersonajeBD{
        public static function conectar($database='creaciones',$host="", $user='root', $password='root') {
            try {
                $host = "mongodb://$user:$password@172.22.0.2:27017"; //MongoDB en Docker
                $conexion = (new Client($host))->{$database};
            } catch (Exception $e){
                echo $e->getMessage();
            }
            return $conexion;
        }


        public static function cargarPersonajes(){
            $conexion = self::conectar();
            $consulta = $conexion->personajes->find();
            $arrayConsulta = array();
            foreach ($consulta as $personaje) {
                $personajepoo = new Personaje("",$personaje['nombre'],$personaje['raza'],$personaje['clase']);
                array_push($arrayConsulta,$personajepoo);
            }
            $conexion = null;
            return $arrayConsulta;
          
        }

        public static function guardarPersonaje($nombre,$raza,$clase){
            $conexion = self::conectar();

            $conexion->personajes->insertOne([
                'nombre' => $nombre,
                'raza' => $raza,
                'clase' => $clase
            ]);
            $conexion = null;
        }
    }

