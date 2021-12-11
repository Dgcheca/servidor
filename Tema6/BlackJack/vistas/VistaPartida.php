<?php
class VistaPartida
{
    public static function renderPortada(){ 
        include("header.php");
        echo '
         
          <div class="row text-center p-5">
              <div class="col justify-content-center">
                <img class="img-fluid rounded mx-auto d-block logo" src="img/logo.png" alt="Responsive image">
              </div>
          </div>
          <div class="row text-center my-5">
              <div class="col-6">
              <a href="enrutador.php?accion=partida" class="btn btn-danger">NUEVA PARTIDA</a>
              </div>
              <div class="col-6">
              <button id="" type="button" class="btn btn-danger">SALIR DEL JUEGO</button> 
              </div>
          </div>'; //EL BOTON DE SALIR DEL JUEGO LO HE PUESTO POR LA COÑA

        include("pie.php");
    }

    public static function render(){
        $partida = unserialize($_SESSION['partida']);
        include("header.php");
        echo '<main class="m-1 p-5">
            <div class="row oponente">
                <div class="col-1 baraja">
                <img class="carta" src="img/reverso.jpg" alt="">
                </div>';
  

        echo '<div class="col-11 cartasCrupier">';


        $crupier = $partida->getCrupier();
        $cartasCrupier = $crupier->getMano();
        foreach ($cartasCrupier as $key => $carta) {
            if ($key == 0) {
                $cartaimagen = $carta->getPalo() . "" . $carta->getFigura();
                echo '<img class="carta" src="img/' . $cartaimagen . '.png" alt="">';
            } else {
            echo '<img class="carta" src="img/reverso.jpg" alt="">';
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
            <div id="opciones" class="row opciones">
                <div class="col-4"><a href="enrutador.php?accion=abandonarPartida" class="btn btn-danger">Abandonar Partida</a></div>
                <div class="col-4"><a href="enrutador.php?accion=plantarse" class="btn btn-danger">Plantarse</a></div>
                <div class="col-4"><a href="enrutador.php?accion=pedirCarta" class="btn btn-danger">Pedir Carta</a></div>
            </div>      
        </main>';
        include("pie.php");
    }
    public static function renderFinal(){
        $partida = unserialize($_SESSION['partida']);
        include("header.php");
        echo '<main class="m-1 p-5">
            <div class="row oponente">
                <div class="col-1 baraja">';
        if (isset($_SESSION['partida'])) {
            echo '<img class="carta" src="img/reverso.jpg" alt=""></div>';
        };

        echo '<div class="col-11 cartasCrupier">';


        $crupier = $partida->getCrupier();
        $cartasCrupier = $crupier->getMano();
        foreach ($cartasCrupier as $carta) {
            $cartaimagen = $carta->getPalo() . "" . $carta->getFigura();
            echo '<img class="carta" src="img/' . $cartaimagen . '.png" alt="">';
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
            <div id="opciones" class="row opciones">
                <div class="col-4"><a href="enrutador.php?accion=abandonarPartida" class="btn btn-danger">Abandonar Partida</a></div>
                <div class="col-4"><a href="enrutador.php?accion=nuevaPartida" class="btn btn-danger">Nueva Partida</a></div>
            </div>      
        </main>';
        if (isset($_SESSION['ganador'])) {
            if ($_SESSION['ganador']=='jugador') {
                echo '<div class="display-1 mensaje text-uppercase text-danger "> has ganado</div>';
            } else if ($_SESSION['ganador'] == 'crupier') {
                echo '<div class="display-1 mensaje text-uppercase text-danger "> has perdido</div>';
                
            } else if ( $_SESSION['ganador'] = 'empate')
            echo '<div class="display-1 mensaje text-uppercase text-danger "> empate</div>';
        }
        include("pie.php");
    }
}
