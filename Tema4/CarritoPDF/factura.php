<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegazos.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: gray;
        }

        .table {
            background-color: white;
        }
    </style>

</head>

<body>
    <?php
    include "cabecera.php";
    ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class='col'>
                <?php
                if ($_GET) {
                    if (isset($_GET['fichero'])) {
                        echo "Gracias por su compra {$_GET['nombre']} <br>";
                        echo "Esperamos verle pronto!<br>";
                        echo "<br>";
                        echo "Aqui puede ver su factura: <a href='{$_GET['fichero']}'> ver factura </a><br>";
                        echo "<br>";
                        echo "O enviela a su correo electronico aqui: ";
                        $fichero = $_GET['fichero'];
                        $email = $_GET['email'];
                        $nombre = $_GET['nombre'];
                    }
                }
                ?>
            </div>
        </div>


       <form action="controlador.php" method="post">
        <input type="hidden" name="fichero" value="<?=$fichero?>">
        <input type="hidden" name="email" value="<?=$email?>">
        <input type="hidden" name="nombre" value="<?=$nombre?>" />
        <button type="submit" name="enviarcorreo">Enviar a mi Correo y volver al Inicio</button>
        </form>
    </div>


</body>

</html>