<?php 

use MongoDB\Client;
require 'vendor/autoload.php';

    class ContactoBD{

        public static function conectar($database='agenda',$host="mongodb://localhost:27017", $user = 'root', $password = 'root') {
            try {
                //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
                //$host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
                $host = "mongodb://$user:$password@172.29.0.2:27017/"; //MongoDB en Docker
                $conexion = (new Client($host))->{$database};
            } catch (Exception $e){
                echo $e->getMessage();
            }
    
            return $conexion;
        }



        public static function leerAgenda(){
            $conexion = self::conectar();
            $consulta = $conexion->contactos->find();
            $arrayConsulta = array();
            foreach ($consulta as $contacto) {
                $contactopoo = new Contacto($contacto['id'],$contacto['nombre'],$contacto['apellidos'],$contacto['email'],$contacto['numero']);
                array_push($arrayConsulta,$contactopoo);
            }
            $conexion = null;
            return $arrayConsulta;
        }

        public static function insertarContacto($contacto){
            $conexion = self::conectar();

            //ENCUENTRA EL MAYOR ID PARA SIMULAR UN AUTOINCREMENT
            $contactoMayor = $conexion->contactos->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($contactoMayor))
                $idValue = $contactoMayor['id'];
            else
                $idValue = 0;

          
            $conexion->contactos->insertOne([
                'id' => intVal($idValue +1),
                'nombre' => $contacto->getNombre(),
                'apellidos' => $contacto->getApellidos(),
                'email' => $contacto->getEmail(),
                'numero' => $contacto->getMovil()

            ]);
            $conexion = null;
        }

        public static function borrarContacto($id) {
            $conexion = self::conectar();
            $conexion->contactos->deleteOne(['id' => intVal($id)]);
            $conexion = null;
        }

        public static function borrarTodos() {
            $conexion = self::conectar();
            $conexion->contactos->deleteMany([]);
            $conexion = null;
        }

        public static function leerContacto($id){
            $conexion = self::conectar();
            $consulta = $conexion->contactos->find(['id' => intVal($id)]);
            foreach ($consulta as $contacto) {
                $contactopoo = new Contacto($contacto['id'],$contacto['nombre'],$contacto['apellidos'],$contacto['email'],$contacto['numero']);
            }
            $conexion = null;
            return $contactopoo;
        }

        public static function editarContacto($id, $nombre, $apellidos, $email, $movil){
            $conexion = self::conectar();
            $conexion->contactos->updateOne(
                ['id' => intVal($id)],
                ['$set' => ['nombre' => $nombre,
                'apellidos' => $apellidos,
                'email' => $email,
                'numero' => $movil]]);
            $conexion = null;
        }
    }
