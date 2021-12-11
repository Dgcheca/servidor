<?php
class VistaPartida
{
    public static function render(){
        include("header.php");
    }
    public static function renderPartida(){
        $partida = unserialize($_SESSION['partida']);
        echo '<main class="p-5">
                <div class="row oponente">
                    <div class="col-1 baraja">
                        <img class="carta" src="img/reverso.jpg" alt="">
                    </div>
                    <div class="col-11 cartasCrupier">';

            
            $crupier = $partida->getCrupier();
            $cartasCrupier = $crupier->getMano();
        if (isset($_SESSION['ganador'])) {
            foreach ($cartasCrupier as $carta) {
                $cartaimagen = $carta->getPalo() . "" . $carta->getFigura();
                echo '<img class="carta" src="img/' . $cartaimagen . '.png" alt="">';
            }
        } else{
            foreach ($cartasCrupier as $key => $carta) {
                if ($key == 0) {
                    $cartaimagen = $carta->getPalo() . "" . $carta->getFigura();
                    echo '<img class="carta" src="img/' . $cartaimagen . '.png" alt="">';
                } else {
                echo '<img class="carta" src="img/reverso.jpg" alt="">';
                }
            }
        }

        echo '</div></div>

            <div class="row-cols-1 jugador">
                <div class="col-12 cartasJugador">';


        $jugador = $partida->getJugador();
        $cartasjugador = $jugador->getMano();
        foreach ($cartasjugador as $carta) {
            $cartaimagen = $carta->getPalo() . "" . $carta->getFigura();
            echo '<img class="carta" src="img/' . $cartaimagen . '.png" alt="">';
        }
        echo '</div></div>
        <div id="opciones" class="row opciones text-center m-5">
        <div class="col-4"><button id="nuevaPartida2" class="btn btn-danger">Nueva Partida</button></div>
        <div class="col-4"><button id="plantarse" class="btn btn-danger">Plantarse</button></div>
        <div class="col-4"><button id="pedirCarta" class="btn btn-danger">Pedir Carta</button></div>
        </div></main>';
        if (isset($_SESSION['ganador'])) {
            if ($_SESSION['ganador']=='jugador') {
                echo '<div class="display-1 mensaje text-uppercase text-danger "> has ganado</div>';
            } else if ($_SESSION['ganador'] == 'crupier') {
                echo '<div class="display-1 mensaje text-uppercase text-danger "> has perdido</div>';
                
            } else if ( $_SESSION['ganador'] = 'empate')
            echo '<div class="display-1 mensaje text-uppercase text-danger "> empate</div>';
        }
    }
}
