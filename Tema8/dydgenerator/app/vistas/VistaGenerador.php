<?php
    class VistaGenerador {
        public static function render(){
            include("header.php");
        }
        public static function renderRazas($opciones){
                echo "
                    <div class='container'>
                    <h1 class='card text-dark m-2 bg-light text-center' style='max-width:68rem';>Elige una raza para tu personaje</h1>
                ";
            foreach($opciones as $opcion){
                echo "<div name='tarjeta' class='card text-dark m-2 bg-light d-inline-block' style='width: 22rem;'>
                        <img src='imagenes/{$opcion->index}.png' class='card-img-top mt-2' alt='...' style='height:26rem'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$opcion->name}</h5>
                        </div>
                        <button type='button' class='btn btn-warning m-3' style='width: 6rem'; name='verdatos' id='{$opcion->url}'>Ver mas</button>
                    </div>";
            }
                echo "</div>";
        }
        public static function renderDatosRaza($resultado){
            $lenguas = "";
            foreach ($resultado->languages as $lengua) {
                if (strlen($lenguas) ==  0) {
                    $lenguas .= $lengua->name;
                } else {
                    $lenguas .= ", " . $lengua->name;
                }
            }
            echo 
                "<div name='tarjeta' class='card text-dark m-2 bg-light'>  <div class='row'>
                    <div class='col-4'>
                        <img src='imagenes/{$resultado->name}.png' class='card-img-top mt-2' style='width: 22rem;' alt='...'>
                    </div>
                    <div class='col-8'>
                        <div class='card-body'>
                            <div class='row'>
                                <p><strong>Nombre: </strong>{$resultado->name}</p>
                            </div>
                            <div class='row'>
                                <p><strong>Alineamiento: </strong>{$resultado->alignment}</p>
                            </div>
                            <div class='row'>
                                <p><strong>Edad: </strong>{$resultado->age}</p>
                            </div>
                            <div class='row'>
                            <hr class='text-danger'>
                                <p><strong>Tamaño: </strong>{$resultado->size}</p>
                            </div>
                            <div class='row'>
                                <p>{$resultado->size_description}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                                <p><strong>Idiomas: </strong>{$lenguas}</p>
                            </div>
                            <div class='row'>
                                <p>{$resultado->language_desc}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                                <div class='col-6'>
                                    <button type='button' class='btn btn-warning mb-3' style='width: 6rem'; name='elegirRaza' id='{$resultado->name}' url='{$resultado->url}'>Elegir</button>
                                </div>  
                                <div class='col-6'>
                                    <button type='button' class='btn btn-warning mb-3' style='width: 6rem'; name='volverRaza' id='volverRaza'>Volver</button>
                                </div>  
                            </div>
                        </div>
                    </div>
                    
                       
                  
                </div>";
        }
        public static function renderClases($opciones){
            echo "
                <div class='container'>
                <h1 class='card text-dark m-2 bg-light text-center' style='max-width:68rem';>Elige una clase para tu personaje</h1>
            ";
            foreach($opciones as $opcion){
                echo "<div name='tarjeta' class='card text-dark m-2 bg-light d-inline-block' style='width: 22rem;'>
                        <img src='imagenes/{$opcion->name}.png' class='card-img-top mt-2' alt='...' style='height:26rem'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$opcion->name}</h5>
                        </div>
                        <button type='button' class='btn btn-warning m-3' style='width: 6rem'; name='verdatosclase' id='{$opcion->url}'>Ver mas</button>
                    </div>";
            }
                echo "</div>";
        }

        public static function renderDatosClase($resultado){
            $competencias = "";
            foreach ($resultado->proficiencies as $competencia) {
                if (strlen($competencias) ==  0) {
                    $competencias .= $competencia->name;
                } else {
                    $competencias .= ", " . $competencia->name;
                }
            }
            $salvaciones = "";
            foreach ($resultado->saving_throws as $salvacion) {
                if (strlen($salvaciones) ==  0) {
                    $salvaciones .= $salvacion->name;
                } else {
                    $salvaciones .= ", " . $salvacion->name;
                }
            }
            $equipamiento = "";
            foreach ($resultado->starting_equipment as $equipo) {
                if (strlen($equipamiento) ==  0) {
                    $equipamiento .= $equipo->equipment->name . "<strong> Cantidad: </strong>" . $equipo->quantity;
                } else {
                    $equipamiento .= ", " . $equipo->equipment->name . "<strong> Cantidad: </strong>: " . $equipo->quantity;
                }
            }
            echo 
                "<div name='tarjeta' class='card text-dark m-2 bg-light'>  <div class='row'>
                    <div class='col-4'>
                        <img src='imagenes/{$resultado->name}.png' class='card-img-top mt-2' style='width: 22rem;' alt='...'>
                    </div>
                    <div class='col-8'>
                        <div class='card-body'>
                            <div class='row'>
                                <p><strong>Nombre: </strong>{$resultado->name}</p>
                            </div>
                            <div class='row'>
                                <p><strong>Puntos de vida: </strong>{$resultado->hit_die}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                            <p><strong>Tiradas de salvacion: </strong>{$salvaciones}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                                <p><strong>Competencias: </strong>{$competencias}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                                <p><strong>Equipamiento inicial: </strong>{$equipamiento}</p>
                            </div>
                            <hr class='text-danger'>
                            <div class='row'>
                                <div class='col-6'>
                                    <button type='button' class='btn btn-warning mb-3' style='width: 6rem';' name='elegirClase' id='{$resultado->name}'url='{$resultado->url}'>
                                    Elegir
                                    </button>
                                </div>  
                                <div class='col-6'>
                                    <button type='button' class='btn btn-warning mb-3' style='width: 6rem'; name='volverClase' id='volverClases'>Volver</button>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>";
        }
        public static function pintarElegirNombre() {
            echo "
            <div class='card' style='height: 8rem; width: 68rem'>
                <div class='card-body'>
                    <h5 class='card-title' >Nombre del personaje:</h5>
                    <form action=''>
                        <div class='row'>
                            <div class='col-8'>
                                <input class='form-control col-8' id='formularioNombre' type='text' placeholder='Nombre' aria-label=''>
                            </div>
                            <div class='col-4'>
                                <button type='button' class='btn btn-warning' id='terminar'>Terminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";
        }

        public static function pintarPersonajeTerminado () {
            echo "
            <div class='card-body'>
                <div class='row'>
                    <p><strong>Personaje terminado, podras verlo en el historial de personajes</strong></p>
                </div>
           
            </div>

            ";
        }

        public static function pintarHistorialPersonajes($listaPersonajes) {
            echo "
            <div class='container'>
                <h1 class='card text-dark m-2 bg-light text-center' style='max-width:68rem';>Personajes creados</h1>
            ";
            if (count($listaPersonajes) > 0) {
            foreach($listaPersonajes as $opcion){
                echo "
                <div name='tarjeta' class='card text-dark m-2 bg-light d-inline-block' style='width: 22rem;'>
                    <img src='imagenes/".$opcion->getRaza().".png' class='card-img-top mt-2' alt='...' style='height:26rem'>
                    <div class='card-body'>
                        <h4 class='card-title'>Nombre: ".$opcion->getNombre()."</h4>
                        <p class='card-text'>Raza: ".$opcion->getRaza()."</p>
                        <p class='card-text'>Clase: ".$opcion->getClase()."</p>
                    </div>
                </div>";
            }
        } else {
            echo "
                <p>No hay personajes creados</p>
            
            ";
        }
            echo "</div>";

        }
    }
    