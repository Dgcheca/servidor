<?php 

use MongoDB\Client;
require 'vendor/autoload.php';

    class ComentarioBD{

        public static function conectar($database='series',$host="", $user = 'root', $password = 'root') {
            try {
                $host = "mongodb://$user:$password@172.22.0.2:27017/"; //MongoDB en Docker
                $conexion = (new Client($host))->{$database};
            } catch (Exception $e){
                echo $e->getMessage();
            }
    
            return $conexion;
        }


        public static function leerComentarios($id){
            $conexion = self::conectar();
            $consulta = $conexion->comentarios->find(['idserie' => intVal($id)]);
            $arrayConsulta = array();
            foreach ($consulta as $comentario) {
                $comentariopoo = new Comentario($comentario['idserie'],$comentario['nick'],$comentario['nota'],$comentario['texto']);
                array_push($arrayConsulta,$comentariopoo);
            }
            $conexion = null;
            return $arrayConsulta;
          
        }

        public static function escribirComentario($id,$nick,$nota,$texto){
            $conexion = self::conectar();

            $conexion->comentarios->insertOne([
                'idserie' => intVal($id),
                'nick' => $nick,
                'nota' => $nota,
                'texto' => $texto
            ]);
            $conexion = null;
        }
    }
