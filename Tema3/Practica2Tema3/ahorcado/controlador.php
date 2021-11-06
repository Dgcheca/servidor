<?php
session_start();

$palabras = array(
    "humanidad", "humano", "persona", "gente", "hombre", "mujer", "bebe", "adolescente", "adulto", "anciano", "don", "caballero", "dama", "individuo",
    "cuerpo", "pierna", "pie", "talon", "espinilla", "rodilla", "muslo", "cabeza", "cara", "boca", "labio", "diente", "ojo", "nariz", "barba", "bigote",
    "colega", "pareja", "amor", "padre", "madre", "criatura", "especie", "nacimiento", "muerte", "naturaleza", "campo", "bosque", "selva", "jungla",
    "desierto", "costa", "playa", "laguna", "lago", "mar", "océano", "cerro", "monte", "energia", "perro", "gato", "vaca", "cerdo", "caballo",
    "yegua", "oveja", "mono", "raton", "rata", "tigre", "conejo", "dragon", "ciervo", "rana", "leon", "jirafa", "elefante", "pajaro", "gallina", "gorrion",
    "cuervo", "aguila", "halcon", "pez", "camaron", "langosta", "sardina", "atun", "calamar", "pulpo", "insecto", "bicho", "mariposa", "polilla",
    "saltamontes", "mosca", "mosquito", "cucaracha", "caracol", "babosa", "lombriz", "marisco", "molusco", "lagarto", "serpiente", "cocodrilo"
);

$letras = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
if ($_GET) {
    if (isset($_GET["nuevaPartida"])) { //INICIAMOS TODOS LOS VALORES O LOS REINICIAMOS SI VOLVEMOS A JUGAR
        $_SESSION['usadas']=array();
        $_SESSION['errores'] = 0;
        $_SESSION['letras'] = $letras;
        shuffle($palabras);
        $_SESSION['palabra'] = $palabras[0];
        $_SESSION['palabraAdivinar'] = "";
        for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
            $_SESSION['palabraAdivinar'] .= "_";
        }
    }
    if (isset($_GET['letraPulsada'])) {
        array_push($_SESSION['usadas'],$_GET['letraPulsada']);
        $arrayPosiciones = array();
        $letraPulsada = $_GET['letraPulsada']; 

        for ($i=0; $i < strlen($_SESSION['palabra']) ; $i++) { 
            if ($_SESSION['palabra'][$i] == $letraPulsada) {
                array_push($arrayPosiciones,$i);
            }
        }
        if (count($arrayPosiciones)>0) {
            for ($i=0; $i < count($arrayPosiciones); $i++) { 
                $_SESSION['palabraAdivinar'][$arrayPosiciones[$i]] = $letraPulsada;
            }
        } else {
            $_SESSION['errores']++;
        }
    }
    header("Location: index.php");
    exit;
}
