<?php
//clave de la api : 84ddb3c6a8969d1786d688ad308fe0d3
    class ControladorBusqueda {
        public static function pintarBusqueda(){
            VistaBusqueda::render();
        }
        public static function pintarBusquedaGenero($id){
            //Ejemplo GET api sin key
            $url = "https://api.themoviedb.org/3/discover/tv?with_genres=$id+&api_key=84ddb3c6a8969d1786d688ad308fe0d3";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $respPHP = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                VistaBusqueda::renderBusqueda($respPHP);
            }
        }
        public static function pintarEnDetalle($id){
            $url = "https://api.themoviedb.org/3/tv/$id?api_key=84ddb3c6a8969d1786d688ad308fe0d3";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $serie = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                $generos = self::buscarGenero($serie);
                $listacomentarios = ComentarioBD::leerComentarios($id);
                VistaBusqueda::renderDetalle($serie,$generos,$listacomentarios);
            }
        }
        public static function buscarGenero($serie){//PARA BUSCAR LOS GENEROS A LOS QUE PERTENECE CADA SERIE
            $url = "https://api.themoviedb.org/3/genre/tv/list?api_key=84ddb3c6a8969d1786d688ad308fe0d3";
            $resultado = file_get_contents($url, false);
            if ($resultado === false) {
                echo "Error haciendo petición";
                exit;
            } else {
                $generos = "";
                $listageneros = json_decode($resultado); //PASAMOS EL JSON A OBJETO
                foreach ($serie->genres as $genero) {
                    foreach ($listageneros->genres as $listado) {
                        if ($listado->id == $genero->id) {
                            $generos .= $listado->name . ", ";
                        }
                    }
                }
                return $generos;
            }
        }
        public static function guardarComentario($id,$nick,$nota,$texto){
            ComentarioBD::escribirComentario($id,$nick,$nota,$texto);
            self::pintarEnDetalle($id);
        }
    }

?>