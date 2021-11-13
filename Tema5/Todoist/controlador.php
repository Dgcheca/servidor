<?php
include("lib.php");



    if ($_POST) {
        if (ISSET($_POST['nuevaTarea'])) {
            $nombre = filtrado($_POST['nombre']);
            $fecha = filtrado($_POST['fecha']);
            $prioridad = filtrado($_POST['prioridad']);
            nuevaTarea($nombre, $fecha, $prioridad);
        }
    }
    if ($_GET) {
        if (isset($_GET['accion'])){
            if ($_GET['accion'] == "borrarTarea") {
                $id = $_GET['id'];
                $tareas = leerArchivo();
                file_put_contents("tasks.txt","", LOCK_EX);
                foreach ($tareas as $tarea) {
                    if ($tarea[0] != $id) {
                        $linea = $tarea[0] ."|". $tarea[1] ."|". $tarea[2] ."|". $tarea[3];
                        file_put_contents("tasks.txt",$linea, FILE_APPEND | LOCK_EX);
                    }
                }
                header("Location:index.php");
            }
        }
    }

?>

