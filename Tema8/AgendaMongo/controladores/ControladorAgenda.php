<?php

class ControladorAgenda
{

    public static function mostrarAgenda(){
        $agenda = ContactoBD::leerAgenda();
        $vistaC = new VistaContacto();
        $vistaC->render($agenda);
    }

    public static function borrarContacto(){
        ContactoBD::borrarContacto($_REQUEST['id']);
        header("Location:enrutador.php?accion=inicio");
    }

    public static function borrarTodo(){
        ContactoBD::borrarTodos();
        header("Location:enrutador.php?accion=inicio");
    }

    public static function insertarContacto(){
        $nombre = filtrado($_REQUEST['nombre']);
        $apellidos = filtrado($_REQUEST['apellidos']);
        $email = filtrado($_REQUEST['email']);
        $movil = filtrado($_REQUEST['movil']);

        $contacto = new Contacto(0,$nombre, $apellidos, $email, $movil);
        ContactoBD::insertarContacto($contacto);
        header("Location:enrutador.php?accion=inicio");
    }
    public static function editarContactoVista(){
        $contacto = ContactoBD::leerContacto($_REQUEST['id']);
        $vistaE = new VistaEditarContacto();
        $vistaE->render($contacto);
    }

    public static function confirmarEditar(){
        $id = filtrado($_REQUEST['id']);
        $nombre = filtrado($_REQUEST['nombre']);
        $apellidos = filtrado($_REQUEST['apellidos']);
        $email = filtrado($_REQUEST['email']);
        $movil = filtrado($_REQUEST['movil']);

        ContactoBD::editarContacto($id, $nombre,$apellidos,$email,$movil);
        header("Location:enrutador.php?accion=inicio");
    }
    

}
