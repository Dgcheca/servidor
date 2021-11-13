<?php
    function leerArchivo(){
        $tareas = array();
        $lineasFichero = file("tasks.txt");
        foreach ($lineasFichero as $linea) {
            array_push($tareas,explode("|",$linea));
        }
        return $tareas;
    }

    function filtrado($datos)
    {
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }
    
    function nuevaTarea($nombre, $fecha, $prioridad){
        $tareas = leerArchivo();
        $id = 0;
        foreach ($tareas as $linea) {
            if ($linea[0] > $id) {
                $id = $linea[0];
            }
        }
        $id = $id+1;
        $tarea =$id ."|". $nombre ."|". $fecha ."|". $prioridad .PHP_EOL;
        file_put_contents("tasks.txt",$tarea, FILE_APPEND | LOCK_EX);
        header("Location:index.php");
    }
?>