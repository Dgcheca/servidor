<?php
session_start();

//inicia los valores de la encuesta
if (!isset($_SESSION['opcion1']) || !isset($_SESSION['opcion2'])) {
  $_SESSION['opcion1'] = 0;
  $_SESSION['opcion2'] = 0;
  $_SESSION['votos'] = 1;
}

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
    .tabla{
      margin: 100px 200px;
    }
    button{
      width: 100px;
    }
  </style>

</head>

<body>
  
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Encuestas IES Jaroso</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
      </ul>
    </header>
  </div>


<div class="tabla">
  <h1>Encuesta sobre las asignaturas del IES Jaroso</h1>
  <p>¿Cual es tu asignatura favorita?</p>
  <form name="encuesta" action="controlador.php" method="POST">
    <table>
      <tr>
        <td>
          <button type="submit" id="boton1" name="boton1">Servidor</button>
        </td>
        <td>
          <progress id="asig1" max="100" value="<?= ($_SESSION['opcion1']*100)/$_SESSION['votos']?>"></progress>
        </td>
        <td>
        <?= ($_SESSION['opcion1']*100)/$_SESSION['votos']?>%
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" id="boton2" name="boton2">Cliente</button>
        </td>
        <td>
          <progress id="asig2" max="100" value="<?= ($_SESSION['opcion2']*100)/$_SESSION['votos']?>"></progress> 
        </td>
        <td>
        <?= ($_SESSION['opcion2']*100)/$_SESSION['votos']?>%
        </td>
      </tr>
      <tr>
        <td>
          <p>Cantidad de votos: <?=$_SESSION['votos']?></p>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" id="boton3" name="boton3">Reiniciar encuesta</button>
        </td>
      </tr>
    </table>
  </form>
</div>
</body>

</html>
