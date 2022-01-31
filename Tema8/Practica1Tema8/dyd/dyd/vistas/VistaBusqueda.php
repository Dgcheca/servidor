<?php
    class VistaBusqueda {
        public static function render(){
            include("header.php");
        }
        public static function renderbusqueda($resultado){
            foreach($resultado->results as $serie) {
                echo "<div name='tarjeta' class='card text-dark m-2' style='width: 18rem;'>
                    <img src='https://image.tmdb.org/t/p/w500{$serie->backdrop_path}' class='card-img-top mt-2' alt='...'>
                   <div class='card-body'>
                       <h5 class='card-title'>{$serie->name}</h5>
                       <p class='card-text'>Media: {$serie->vote_average} con: {$serie->vote_count} votos</p>
                      <p class='card-text overflow-auto' style='height: 8rem;'>{$serie->overview}</p>
                   </div>
                <button type='button' class='btn btn-danger mb-5' name='verdatos' id='{$serie->id}'>Ver en detalle</button>
                </div>";
            }
        }
        public static function renderDetalle($serie,$generos){
          
            
            echo "<div name='tarjeta' class='card text-dark m-2'>
                    <div class='card-body'>        
                        <div class='row mt-2'>
                            <div class='col-3'><img src='https://image.tmdb.org/t/p/w500{$serie->backdrop_path}'style='width: 18rem'; class='card-img-top' alt='...'></div>
                            <div class='col-9'><h5 class='card-title'>{$serie->name}</h5><p class='card-text'>Media: {$serie->vote_average} con: {$serie->vote_count} votos</p>
                                <p class='card-text' style='height: 8rem;'>{$serie->overview}</p>
                            </div>
                        </div>
                            
                        <div class='row m-2'>
                                    <p>Fecha de la primera emision: {$serie->first_air_date}</p>
                                            <p>Nombre original: {$serie->original_name}</p>
                                            <p>Idioma original: {$serie->original_language}</p>
                                            <p>Pais de origen: {$serie->origin_country[0]}</p>
                                            <p>Generos en los que se incluye: $generos
                        </div>
                    </div>
                </div>

                <hr class='m-2'>

                <div id='botoneracomentarios' class='card text-dark m-2'>
                    <div class='row justify-content-center'>
                        <button type='button' class='btn btn-danger col-3 mx-5 my-2' name='vercomentarios' id='vercomentarios' value='{$serie->id}'>Ver Comentarios</button>
                        <button type='button' class='btn btn-danger col-3 mx-5 my-2' name='escribircomentarios' id='escribircomentarios' value='{$serie->id}'>Escribir Comentario</button>
                    </div>
                </div>

                <hr class='m-2'>

                <div id='cajacomentarios'></div>";
        }

        public static function renderComentarios($comentarios){
         
            echo "<div class='card text-dark'>";
            if (count($comentarios) > 0){
                foreach ($comentarios as $comentario) {
                    echo "<div name='tarjeta' class='card m-2'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-2'>
                                    Nick: 
                            
                            ";
                                    echo $comentario->getNick();
                    echo "          </div>
                                    <div class='col-1'>
                                    Nota: ";
                                    echo $comentario->getNota();
                    echo "          </div>
                                
                                
                                    <div class='col-9'>
                                    Reseña: ";
                                    echo $comentario->getTexto();
                    echo "          </div>
                                </div>
                            </div>
                        </div>";
                }
            
            } else {
                echo "<p class='m-5'>No hay comentarios para esta serie</p>";
            }
            echo "</div>";
        }

        public static function renderEscribirComentarios($id){
            echo "<div class='card text-dark'>
                     <div class='container m-5'>
                        <form id='formularioComentario'>
                            <div class='row mx-5 px-5 justify-content-center'>
                                <div class='mb-3 col-6'>
                                    <label for='nickcomentario' class='form-label'>Nick</label>
                                    <input class='form-control' id='nickcomentario' type='text' required placeholder='Nick' aria-label=''>
                                </div>

                                <div class='mb-3 col-1 '>
                                    <label for='notacomentario' class='form-label'>Nota</label>
                                    <input class='form-control' id='notacomentario' type='number' required placeholder='1' min='1' max='10' aria-label='Nota'>
                                </div>

                            
                            </div>

                            <div class='row mx-5 px-5 justify-content-center'>
                                <div class='mb-3 col-7'>
                                    <label for='textocomentario' class='form-label'></label>
                                    <textarea class='form-control' id='textocomentario' rows='5' aria-label='' required></textarea>
                                </div>
                            </div>

                            <div class='row m-5 justify-content-center'>
                                <button type='button' class='btn btn-danger col-2' name='enviarcomentario' id='enviarcomentario' value='$id'>Enviar Comentarios</button>
                            </div>
                        </form>
                    </div>
                </div>";
        }
    }

?>
