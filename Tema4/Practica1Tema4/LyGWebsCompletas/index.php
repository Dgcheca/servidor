<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  // Crear un flujo
  $opciones = array(
    'http' => array(
      'method' => "GET",
      'header' => "Accept-language: en\r\n" .
        "Cookie: foo=bar\r\n"
    )
  );
  $contexto = stream_context_create($opciones);
  ?>
  <div class="content">
    <div class="row">
      <ul>
        <li>
          <a href='index.php?cargar=cnn'>Cargar Fichero CNN</a>
        </li>
        <li>
          <a href='index.php?cargar=facebook'>Cargar Fichero Facebook</a>
        </li>
        <li>
          <a href='index.php?ver=cnn'>Ver concordancias: "Biden"</a>
        </li>
        <li>
          <a href='index.php?ver=facebook'>"Intentar" ver Facebook</a>
        </li>
      </ul>
    </div>
  </div>
  <?php
  if ($_GET) {
    if (isset($_GET['cargar'])) {
      if ($_GET['cargar'] == 'cnn') { // ESTE NO HACIA FALTA, PERO PREFERIA PONER LOS DOS
        $web = file_get_contents("https://cnnespanol.cnn.com/", false, $contexto);
        file_put_contents("cnn.html", $web);
      }
      if ($_GET['cargar'] == 'facebook') {
        $web = file_get_contents("https://facebook.com/", false, $contexto);
        file_put_contents("facebook.html", $web);
      }
    }
    if (isset($_GET['ver'])) {
      if ($_GET['ver'] == 'cnn') {
        $web = file_get_contents("https://cnnespanol.cnn.com/", false, $contexto);
        $contadorBiden = 0;
        $contadorBiden = substr_count($web, "biden");
        echo "La palabra Biden se ha usado un total de: $contadorBiden veces";
      }
      if ($_GET['ver'] == 'facebook') {
        echo "<img src='facebook.PNG' alt=''>";
      }
    }
  }
  ?>
</body>

</html>