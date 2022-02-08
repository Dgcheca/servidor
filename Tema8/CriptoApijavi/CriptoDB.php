<?php

require 'vendor/autoload.php';

    class CriptoDB {

        public static function getCriptos() {

            $conexion = ConexionBD::conectar("criptomonedas"); //Base de datos 'ejemplo'

            $cursor = $conexion->criptos->find();

            //Crear los objetos para devolverlos (MVC)
            $json= json_encode($cursor->toArray());
            
            ConexionBD::cerrar();

            //Me devuelve un array de objetos
            return $json;
        }

        public static function getTopValue() {

            $conexion = ConexionBD::conectar("criptomonedas"); //Base de datos 'ejemplo'

            $cursor = $conexion->criptos->find(
                [],
                [
                    'limit' => 10,
                    'sort' => ['precio' => -1],
                ]);

            //Crear los objetos para devolverlos (MVC)
            $json= json_encode($cursor->toArray());
            
            ConexionBD::cerrar();

            //Me devuelve un array de objetos
            return $json;
        }

        public static function getCripto($id) {

            $conexion = ConexionBD::conectar("criptomonedas"); //Base de datos 'ejemplo'

            $cripto = $conexion->criptos->findOne(['id' => intval($id)]);

            if ($cripto == null) {
                return header('HTTP/1.1 404 Not found').'{ "msg": "Error, id de criptomoneda desconocido" }';
            }

            //Crear los objetos para devolverlos (MVC)
            $json= json_encode($cripto);
            
            ConexionBD::cerrar();

            //Me devuelve una criptomoneda
            return $json;
        }
       

        public static function insertarCripto() {
            $conexion = ConexionBD::conectar("criptomonedas");

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $criptoMayor = $conexion->criptos->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($criptoMayor))
                $idValue = $criptoMayor['id'];
            else
                $idValue = 0;
                

            try {
                $insertOneResult = $conexion->criptos->insertOne([
                    'id' => intVal($idValue + 1),
                    'nombre' => $_POST['nombre'],
                    'simbolo'=> $_POST['simbolo'],
                    "descrip" => $_POST['descrip'],
                    "precio" => $_POST['precio'],
                    "24h" => $_POST['24h'],
                    "capitalizacion" => $_POST['capitalizacion'],
                ]);
            } catch(Exception $e) {
                return header('HTTP/1.1 500 Internal Server Error').'{ "msg": "Error creando Criptomoneda con POST" }';
            }

            return '{ "msg": "Criptomoneda insertada correctamente" }';

            ConexionBD::cerrar();
        }


        public static function deleteCripto($id) {
            $conexion = ConexionBD::conectar("criptomonedas");

            try {
                $deleteResult = $conexion->criptos->deleteOne(['id' => intVal($id)]);   
            } catch(Exception $e) {
                return header('HTTP/1.1 500 Internal Server Error').'{ "msg": "Error borrando Criptomoneda" }';
            }

            if ($deleteResult->getDeletedCount() < 1) {
                return header('HTTP/1.1 404 Not found').'{ "msg": "Error, id de criptomoneda desconocido" }';
            }

            ConexionBD::cerrar();

            return ' { "msg" : "Criptomoneda eliminada correctamente" }';
        }

        public static function updateCripto($id) {
            $conexion = ConexionBD::conectar("criptomonedas");

            //Leer el json pasado con el método PUT
            $put = file_get_contents( 'php://input', 'r' );
            //Enviamos en POSTMAN en body la canción en formato JSON como raw (marcar también JSON al final)
            $put_json = json_decode($put,true);

            if ($put_json == null) {
                return header('HTTP/1.1 400 Bad request').'{ "msg": "Error, datos de criptomoneda no válidos" }';
            
            } else {

                $updateOneResult = $conexion->criptos->updateOne(
                    ['id' => intVal($id)],
                    [ '$set' => [
                        'nombre' => $put_json['nombre'],
                        'simbolo'=> $put_json['simbolo'],
                        "descrip" => $put_json['descrip'],
                        "precio" => $put_json['precio'],
                        "24h" => $put_json['24h'],
                        "capitalizacion" => $put_json['capitalizacion'],
                    ]  ]);

                ConexionBD::cerrar();
                return ' { "msg" : "Criptomoneda modificada correctamente" }';
            }
            
        }

        public static function modificarPrecio($id,$cantidad) {
            $conexion = ConexionBD::conectar("criptomonedas");

            $cripto = $conexion->criptos->findOne(['id' => intval($id)]);
            $precio = intval($cripto['precio']);

            $updateOneResult = $conexion->criptos->updateOne(
                ['id' => intVal($id)],
                [ '$set' => [
                    "precio" => intVal($precio + $cantidad),
                ]  ]);

            ConexionBD::cerrar();
            return ' { "msg" : "Criptomoneda modificada correctamente" }';
        }








    }





?>