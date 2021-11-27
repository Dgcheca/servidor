<?php
session_start();
include("lib.php");


if ($_GET) {
    if (isset($_GET['accion'])) {
        if ($_GET['accion'] == "mostrarTodosLibros") {
            $_SESSION['busquedaLibros'] = cargarLibrosTodos();
            header("Location: libros.php");
            exit;
        }
        if ($_GET['accion'] == "borrarLibro") {
            eliminarLibro($_GET["id"]);
            header("Location: libros.php");
            exit;
        }
        if ($_GET['accion'] == 'editarLibro') {
            $id = $_GET['id'];
            header("Location: editarLibro.php?id=$id");
            exit;
        }

        //------------GET USUARIOS--------------//
        if ($_GET['accion'] == 'mostrarTodosUsuarios') {
            $_SESSION['busquedaUsuarios'] = cargarUsuariosTodos();
            header("Location: usuarios.php");
            exit;
        }
        if ($_GET['accion'] == "borrarUsuario") {
            eliminarUsuario($_GET["id"]);
            header("Location: usuarios.php");
            exit;
        }
        if ($_GET['accion']=="imprimirCSV") {
            $usuario = cargarUsuarioID($_GET['id']);
            $prestamos = cargarPrestamosBusqueda($usuario["dni"]);
            generarCSV($usuario,$prestamos);
            header("Location: usuarios.php");
            exit;
        }
        //------------GET PRESTAMOS-------------//
        if ($_GET['accion'] == 'mostrarTodosPrestamos') {
            $_SESSION['busquedaPrestamos'] = cargarPrestamosTodos();
            header("Location: prestamos.php");
            exit;
        }
        if ($_GET['accion'] == 'editarPrestamo') {
            $id = $_GET['id'];
            header("Location: editarPrestamo.php?id=$id");
            exit;
        }
    }
}

if ($_POST) {
    if (isset($_POST['accion'])) {
        //--------------------POST LIBROS------------------------//
        if ($_POST['accion'] == "incluirNuevoLibro") {
            $ISBN = filtrado($_POST['ISBN']);
            $titulo = filtrado($_POST['titulo']);
            $subtitulo = filtrado($_POST['subtitulo']);
            $descripcion = filtrado($_POST['descripcion']);
            $autor = filtrado($_POST['autor']);
            $editorial = filtrado($_POST['editorial']);
            $categoria = filtrado($_POST['categoria']);
            if (!empty($_FILES['portada']['tmp_name'])) {
                $image = file_get_contents($_FILES['portada']['tmp_name']);
                $portada = $image;
            } else
                $portada = "-";
            $cantidadTotal = filtrado($_POST['cantidadTotal']);
            incluirNuevoLibro($ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $cantidadTotal);
            header("Location: libros.php");
            exit;
        }
        if ($_POST['accion'] == 'buscar') {
            $_SESSION['busquedaLibros'] = cargarLibrosBusqueda($_POST['busqueda']);
            header("Location: libros.php");
            exit;
        }
        if ($_POST['accion'] == "guardarLibroEditado") {
            $id = filtrado($_POST['id']);
            $ISBN = filtrado($_POST['ISBN']);
            $titulo = filtrado($_POST['titulo']);
            $subtitulo = filtrado($_POST['subtitulo']);
            $descripcion = filtrado($_POST['descripcion']);
            $autor = filtrado($_POST['autor']);
            $editorial = filtrado($_POST['editorial']);
            $categoria = filtrado($_POST['categoria']);
            if (!empty($_FILES['portada']['tmp_name'])) {
                $image = file_get_contents($_FILES['portada']['tmp_name']);
                $portada = $image;
            } else
                $portada = "-";
            $cantidadTotal = filtrado($_POST['cantidadTotal']);
            $cantidadDispo = filtrado($_POST['cantidadDispo']);
            guardarLibroEditado($id, $ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $cantidadTotal, $cantidadDispo);
            header("Location: libros.php");
            exit;
        }

        //-----------------POST USUARIOS----------------------------//
        if ($_POST['accion'] == "incluirNuevoUsuario") {
            $nombre = filtrado($_POST['nombre']);
            $apellidos = filtrado($_POST['apellidos']);
            $dni = filtrado($_POST['dni']);
            $edad = filtrado($_POST['edad']);
            $telefono = filtrado($_POST['telefono']);
            $direccion = filtrado($_POST['direccion']);
            $poblacion = filtrado($_POST['poblacion']);
            $email = filtrado($_POST['email']);

            incluirNuevoUsuario($nombre, $apellidos, $dni, $edad, $telefono, $direccion, $poblacion, $email);
            header("Location: usuarios.php");
            exit;
        }
        //----------------POST PRESTAMOS---------------------------//
        if ($_POST['accion'] == "nuevoPrestamo"){
            $fechainicio = filtrado($_POST['fechaInicio']);
            $fechafin = filtrado($_POST['fechaFin']);
            $estado = filtrado($_POST['estado']);
            $idUsuario = filtrado($_POST['usuario']);
            $idLibro = filtrado($_POST['libro']);

            incluirNuevoPrestamo($fechainicio,$fechafin,$estado,$idUsuario,$idLibro);
            header("Location: prestamos.php");
            exit;
        }
        if ($_POST['accion'] == "guardarPrestamoEditado") {
            $id = filtrado($_POST['id']);
            $fechaFin = filtrado($_POST['fechaFin']);
            $estado = filtrado($_POST['estado']);
            $libroId = filtrado($_POST['libroId']);
          
            guardarPrestamoEditado($id,$fechaFin,$estado,$libroId);
            header("Location: prestamos.php");
            exit;
        }

        if ($_POST['accion'] == "buscarPrestamo") {
            $_SESSION['busquedaPrestamos'] = cargarPrestamosBusqueda($_POST['busqueda']);
            header("Location: prestamos.php");
            exit;
        }
    }
}
