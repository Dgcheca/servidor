<?php
session_start();

//Función para filtrar los campos del formulario
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

//Has recibido un formulario o bien el login o el registro
if ($_POST) {

    //ACCIONES CON POST
    if (isset($_POST['accion'])) {
        //LOGIN ------------------------------------------------------------------------
        if ($_POST['accion'] == "login") {
            //Leer valor del email
            if (isset($_POST['email'])) {
                $email = filtrado($_POST['email']);
            }
            //Leer valor de la contraseña
            if (isset($_POST['password'])) {
                $password = filtrado($_POST['password']);
            }

            //Metemos en la sesión el usuario registrado
            $_SESSION['usuario'] = $email;

            //Metemos todos los alumnos en la sesión
            $_SESSION['alumnos'] = array(

                array("apellidos" => "Garcia", "nombre" => "Manolo", "edad" => "21", "DNI" => "11111111O", "email" => "maga@gmail.com", "localidad" => "Cuevas del Almanzora", "telefono" => "666555333", "curso" => "1º DAW", "avatar" => ""),
                array("apellidos" => "Calamaro", "nombre" => "Andrés", "edad" => "23", "DNI" => "11111112M", "email" => "marineroycapitan@gmail.com", "localidad" => "Pulpí", "telefono" => "555666222", "curso" => "1º DAW", "avatar" => ""),
                array("apellidos" => "Romero", "nombre" => "Kutxi", "edad" => "32", "DNI" => "11111113J", "email" => "kutrom@hotmail.com", "localidad" => "Vera", "telefono" => "656565322", "curso" => "2º DAW", "avatar" => ""),
                array("apellidos" => "Mercury", "nombre" => "Freddy", "edad" => "30", "DNI" => "11111114R", "email" => "iwanttobefree@hotmail.com", "localidad" => "Mojacar", "telefono" => "565656233", "curso" => "1º GA", "avatar" => ""),
                array("apellidos" => "Cash", "nombre" => "Johnny", "edad" => "27", "DNI" => "11111115E", "email" => "ringoffire@yahoo.com", "localidad" => "Garruchas", "telefono" => "665566323", "curso" => "1º Laboratorio", "avatar" => "")
                );

            //Metemos también los cursos en la sesión
            $_SESSION['cursos']  = array(
                array("id" => 1,"nombre" => "1º DAW", "etapa" => "Ciclo Superior", "fecha" => "2021"),
                array("id" => 2,"nombre" => "2º DAW", "etapa" => "Ciclo Superior", "fecha" => "2021"),
                array("id" => 3,"nombre" => "1º GA", "etapa" => "Grado Medio", "fecha" => "2021"),
                array("id" => 4,"nombre" => "1º Laboratorio", "etapa" => "Grado Medio", "fecha" => "2021"),
            );


            //En el tema BBDD comprobaremos que es correcta la información

            //Por ahora redirigimos a home.php
            header("Location: home.php");
            exit;
        }
        //FIN LOGIN --------------------------------------------------------------------
        //REGISTRO ---------------------------------------------------------------------
        if ($_POST['accion'] == "registro") {
            //Leer valor del email
            if (isset($_POST['email'])) {
                $email = filtrado($_POST['email']);
            }
            //Leer valor de la contraseña
            if (isset($_POST['password'])) {
                $password = filtrado($_POST['password']);
            }
            //Leer valor del nombre
            if (isset($_POST['nombre'])) {
                $nombre = filtrado($_POST['nombre']);
            }
            //Leer valor de la ciudad
            if (isset($_POST['ciudad'])) {
                $ciudad = filtrado($_POST['ciudad']);
            }
            //Leer valor del estado
            if (isset($_POST['estado'])) {
                $estado = filtrado($_POST['estado']);
            }
            //Leer valor de la especialidad
            if (isset($_POST['especialidad'])) {
                $especialidad = filtrado($_POST['especialidad']);
            }

            //Si no existe ya ese email en BBDD, lo insertaríamos

             //Metemos en la sesión el usuario registrado
             $_SESSION['usuario'] = $email;

             $_SESSION['alumnos'] = array(

                array("apellidos" => "Garcia", "nombre" => "Manolo", "edad" => "21", "DNI" => "11111111O", "email" => "maga@gmail.com", "localidad" => "Cuevas del Almanzora", "telefono" => "666555333", "curso" => "1º DAW", "avatar" => ""),
                array("apellidos" => "Calamaro", "nombre" => "Andrés", "edad" => "23", "DNI" => "11111112M", "email" => "marineroycapitan@gmail.com", "localidad" => "Pulpí", "telefono" => "555666222", "curso" => "1º DAW", "avatar" => ""),
                array("apellidos" => "Romero", "nombre" => "Kutxi", "edad" => "32", "DNI" => "11111113J", "email" => "kutrom@hotmail.com", "localidad" => "Vera", "telefono" => "656565322", "curso" => "2º DAW", "avatar" => ""),
                array("apellidos" => "Mercury", "nombre" => "Freddy", "edad" => "30", "DNI" => "11111114R", "email" => "iwanttobefree@hotmail.com", "localidad" => "Mojacar", "telefono" => "565656233", "curso" => "1º GA", "avatar" => ""),
                array("apellidos" => "Cash", "nombre" => "Johnny", "edad" => "27", "DNI" => "11111115E", "email" => "ringoffire@yahoo.com", "localidad" => "Garruchas", "telefono" => "665566323", "curso" => "1º Laboratorio", "avatar" => "")
                );

            //Metemos también los cursos en la sesión
            $_SESSION['cursos']  = array(
                array("id" => 1,"nombre" => "1º DAW", "etapa" => "Ciclo Superior", "fecha" => "2021"),
                array("id" => 2,"nombre" => "2º DAW", "etapa" => "Ciclo Superior", "fecha" => "2021"),
                array("id" => 3,"nombre" => "1º GA", "etapa" => "Grado Medio", "fecha" => "2021"),
                array("id" => 4,"nombre" => "1º Laboratorio", "etapa" => "Grado Medio", "fecha" => "2021"),
            );
            

            //Por ahora redirigimos a home.php (para que funcione quitar echos de antes)
            header("Location: home.php");
            exit;
        }
        //FIN REGISTRO ------------------------------------------------------------------
        //MODIFICAR ALUMNO --------------------------------------------------------------
        if ($_POST['accion'] == "modificarAlumno") {
            $email = filtrado($_POST['email']);
            for($i=0; $i<count($_SESSION['alumnos']); $i++) {
                if (strcmp($email, $_SESSION['alumnos'][$i]['email']) == 0) {
                    //Modificar                       
                    $_SESSION['alumnos'][$i]['nombre'] = filtrado($_POST['nombre']);
                    $_SESSION['alumnos'][$i]['apellidos'] = filtrado($_POST['apellidos']);
                    $_SESSION['alumnos'][$i]['edad'] = filtrado($_POST['edad']);
                    $_SESSION['alumnos'][$i]['DNI'] = filtrado($_POST['DNI']);
                    $_SESSION['alumnos'][$i]['localidad'] = filtrado($_POST['localidad']);
                    $_SESSION['alumnos'][$i]['telefono'] = filtrado($_POST['telefono']);
                    $_SESSION['alumnos'][$i]['curso'] = filtrado($_POST['curso']);

                    break;                        
                }
            }

            header("Location: alumnos.php"); 
            exit;
        }
        //FIN MODIFICAR ALUMNO ----------------------------------------------------------

        //INSERTAR ALUMNO --------------------------------------------------------------
        if ($_POST['accion'] == "insertarAlumno") {

            $alumno['nombre'] = filtrado($_POST['nombre']);
            $alumno['apellidos'] = filtrado($_POST['apellidos']);
            $alumno['edad'] = filtrado($_POST['edad']);
            $alumno['email'] = filtrado($_POST['email']);
            $alumno['dni'] = filtrado($_POST['dni']);
            $alumno['localidad'] = filtrado($_POST['localidad']);
            $alumno['telefono'] = filtrado($_POST['telefono']);
            $alumno['curso'] = filtrado($_POST['curso']);
            $alumno['avatar'] = "";

            //Metemos en la sesión
            array_push($_SESSION['alumnos'],$alumno);

            header("Location: alumnos.php"); 
            exit;
        }
        //FIN INSERTAR ALUMNO ----------------------------------------------------------

        //INSERTAR CURSO --------------------------------------------------------------
        if ($_POST['accion'] == "insertarCurso") {

            //Calculamos el mayor id
            $id = max(array_column($_SESSION['cursos'],'id'));
            $curso['id'] = $id+1;

            $curso['nombre'] = filtrado($_POST['nombre']);
            $curso['etapa'] = filtrado($_POST['etapa']);
            $curso['fecha'] = filtrado($_POST['fecha']);

            //Metemos en la sesión
            array_push($_SESSION['cursos'],$curso);

            header("Location: cursos.php"); 
            exit;
        }
        //FIN INSERTAR CURSO ----------------------------------------------------------


        //MODIFICAR CURSO ---------------------------------------------------------------
        if ($_POST['accion'] == "modificarCurso") {
            $id = filtrado($_POST['id']);
            for($i=0; $i<count($_SESSION['cursos']); $i++) {
                if ($id == $_SESSION['cursos'][$i]['id']) {
                    //Modificar                       
                    $_SESSION['cursos'][$i]['nombre'] = filtrado($_POST['nombre']);
                    $_SESSION['cursos'][$i]['etapa'] = filtrado($_POST['etapa']);
                    $_SESSION['cursos'][$i]['fecha'] = filtrado($_POST['fecha']);
                   
                    break;                        
                }
            }
            header("Location: cursos.php"); 
            exit;
        }
        //FIN MODIFICAR CURSO -----------------------------------------------------------

    }

}


//ACCIONES de alumnos y cursos con GET
if ($_GET) {
    //Ver qué acción se ha elegido
    if (isset($_GET['accion'])) {

        //BORRAR ALUMNO -----------------------------------------------------------------
        if ($_GET['accion'] == "borrarAlumno") {
            $email = filtrado($_GET['email']);

            //Borramos alumno de la sesión
            //Lo buscamos en el array
            for($i=0; $i<count($_SESSION['alumnos']); $i++) {
                if (strcmp($email, $_SESSION['alumnos'][$i]['email']) == 0) {
                    //Borrar
                    unset($_SESSION['alumnos'][$i]);
                }
            }
            //Quitar huecos
            $_SESSION['alumnos'] = array_values($_SESSION['alumnos']);

            //Ir a BBDD y borrar ese alumno

            //Por ahora redirigimos a alumnos.php después de borrar un alumno
            header("Location: alumnos.php"); 
            exit;
        }
        //FIN BORRAR ALUMNO -------------------------------------------------------------

        //EDITAR ALUMNO -----------------------------------------------------------------
        if ($_GET['accion'] == "editarAlumno") {
            $email = filtrado($_GET['email']);
            header("Location: editarAlumno.php?email=".$email); 
            exit;
        }
        //FIN EDITAR ALUMNO -------------------------------------------------------------

        //BORRAR CURSO ------------------------------------------------------------------
        if ($_GET['accion'] == "borrarCurso") {
            $id = filtrado($_GET['id']);

            //Borramos alumno de la sesión
            //Lo buscamos en el array
            for($i=0; $i<count($_SESSION['cursos']); $i++) {
                if ($id == $_SESSION['cursos'][$i]['id']) {
                    //Borrar
                    unset($_SESSION['cursos'][$i]);
                }
            }
            //Quitar huecos
            $_SESSION['cursos'] = array_values($_SESSION['cursos']);

            //Ir a BBDD y borrar ese curso

            //Por ahora redirigimos a cursos.php después de borrar un curso
            header("Location: cursos.php"); 
            exit;
        }
        //FIN BORRAR CURSO --------------------------------------------------------------

        //EDITAR CURSO ------------------------------------------------------------------
        if ($_GET['accion'] == "editarCurso") {
            $id = filtrado($_GET['id']);
            header("Location: editarCurso.php?id=".$id); 
            exit;
        }
        //FIN EDITAR CURSO --------------------------------------------------------------
    }
}


?>