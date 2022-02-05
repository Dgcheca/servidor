<?php
    class VistaGenerador {
        public static function render(){
            include("header.php");
        }
        public static function renderOpciones($opciones){
            foreach($opciones as $opcion){
                echo "<div name='tarjeta' class='card text-dark m-2' style='width: 18rem;'>
                        <img src='' class='card-img-top mt-2' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$opcion->name}</h5>
                            <p class='card-text'>Media: {$opcion->speed} con: {$opcion->alignment} votos</p>
                            <p class='card-text overflow-auto' style='height: 8rem;'>{$opcion->url}</p>
                        </div>
                        <button type='button' class='btn btn-danger mb-5' name='verdatos' id='{$opcion->index}'>Ver en detalle</button>
                    </div>";
            }
        }
    }
    