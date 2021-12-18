<?php

    class ControladorReservas{

        public static function mostrarReservasHoy(){
            $_SESSION['fecha'] = date("Y")."-".date("m")."-".date("d");
            $_SESSION['reservas'] = ReservaBD::mostrarReservasFecha($_SESSION['fecha']);
            VistaReservas::render();
        }

        public static function buscarReservasFecha(){
            $_SESSION['fecha'] = $_REQUEST['fecha'];
            $_SESSION['reservas'] = ReservaBD::mostrarReservasFecha($_REQUEST['fecha']);
            VistaReservas::renderBusqueda();
        }

        public static function buscarEnReservas(){
            $texto = filtrado($_REQUEST['texto']);
            $fecha = $_SESSION['fecha'];
            $_SESSION['reservas'] = ReservaBD::busquedaEnReservas($texto,$fecha);
            VistaReservas::renderBusqueda();
        }
        public static function editarReserva(){
            $reserva = ReservaBD::getReserva($_REQUEST['id']);
            VistaReservas::renderEditarReserva($reserva);
        }
        public static function cancelarReserva(){
            ReservaBD::cancelarReserva($_REQUEST['id']);
            VistaReservas::renderBusqueda();
        }
        public static function nuevaReservaForm(){
            VistaReservas::renderNuevaReserva();
        }
        public static function insertarReserva(){
            $form = $_REQUEST['form'];
            //ReservaBD::insertarReserva();
            VistaReservas::renderNuevaReserva();
        }
    }
?>
