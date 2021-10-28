<?php
include "cabecera.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .banner{
            width: 900px;
            height: 150px;
            display: inline;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <?php
    $cookieEstablecida = false;
    if (!isset($_COOKIE["miCookie"])) {

    ?>
    <div>
        <form name="encuesta" action="controlador.php" method="GET">
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchrol" type="checkbox" role="switch" id="switchrol">
                <label class="form-check-label" for="flexSwitchCheckDefault">Rol</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchestrategia" type="checkbox" role="switch" id="switchestrategia">
                <label class="form-check-label" for="flexSwitchCheckDefault">Estrategia</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchshoters" type="checkbox" role="switch" id="switchshoters">
                <label class="form-check-label" for="flexSwitchCheckDefault">Shoters</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchrpg" type="checkbox" role="switch" id="switchrpg">
                <label class="form-check-label" for="flexSwitchCheckDefault">RPG</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchgestionsimulacion" type="checkbox" role="switch" id="switchgestionsimulacion">
                <label class="form-check-label" for="flexSwitchCheckDefault">Gestion/simulacion</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchcartas" type="checkbox" role="switch" id="switchcartas">
                <label class="form-check-label" for="flexSwitchCheckDefault">Cartas</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchmultijugador" type="checkbox" role="switch" id="switchmultijugador">
                <label class="form-check-label" for="flexSwitchCheckDefault">Multijugador</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="switchmasivos" type="checkbox" role="switch" id="switchmasivos">
                <label class="form-check-label" for="flexSwitchCheckDefault">Masivos Online</label>
            </div>
            <input type="submit" value="Enviar">
        </form>
  
    </div>
  
    <?php
     } else {

    ?>
    <div>
    <?php
        $juegos = explode("|",$_COOKIE['miCookie']);

        $imagen = $juegos[random_int(0,sizeof($juegos)-1)];
        /*he intentado hacerlo con <img src="img/<?=$imagen?>.png" alt=""> pero no me funciona */
        if ($imagen == "estrategia") {
            echo '<img class="banner" src="img/estrategia.png" alt="">';
        } else if ($imagen == "masivos") {
            echo '<img class="banner" src="img/masivos.png" alt="">';
        }else if ($imagen == "gestionsimulacion") {
            echo '<img class="banner" src="img/gestionsimulacion.png" alt="">';
        }else if ($imagen == "rol") {
            echo '<img class="banner" src="img/rol.png" alt="">';
        }else if ($imagen == "shoters") {
            echo '<img class="banner" src="img/shoter.png" alt="">';
        }else if ($imagen == "rpg") {
            echo '<img class="banner" src="img/rpg.png" alt="">';
        }else if ($imagen == "cartas") {
            echo '<img class="banner" src="img/cartas.png" alt="">';
        }else if ($imagen == "multi") {
            echo '<img class="banner" src="img/multi.png" alt="">';
        }
     }
    ?>
    </div>

</body>

</html>