<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
include("./lib/lib.php");
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
        body {
            background-color: gray;
        }
    </style>
</head>
<body>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">OFERTAS DE JUEGAZOS.COM</h1>
                </div>
            </div>
        </section>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    foreach ($productos as $key => $producto) {
                    ?>
                        <div class="col">
                        <div class="card" style="height: 500px; padding:15px">
                                <img src="<?= $producto['img'] ?>" width="100%" height="225">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $producto['nombre'] ?></p>
                                    <p class="card-text"><?= $producto['descripcion'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center" style="position: absolute; bottom:16px">
                                        <div class="btn-group">
                                            <form action="controlador.php" method="post">
                                                <input type="hidden" name='id' value="<?= $producto['id'] ?>">
                                                <div class='form-row row'>
                                                    <div class="col-sm-5">
                                                        <button type="submit" name='comprar' class="btn btn-outline-secondary">Comprar</button>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control input-sm" type="number" name="cantidad" value="1" min="1" max="20">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <small class="text-muted"><?= $producto['precio'] ?>€</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
    </main>
</body>
</html>