<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Agregar Producto</title>
    <style>
        body {
            background-color: gray;
        }
    </style>

</head>

<body>
    <header>
        <?php
        include "cabecera.php";
        ?>
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <h1>AGREGAR PRODUCTO</h1>
                </div>

            </div>
            <div class="row justify-content-center">

                <div class="col-4">
                    <form action="controlador.php" method="POST" enctype="multipart/form-data">
                        <label class="form-label" for="nombreProducto">Nombre del Producto</label>
                        <input class="form-control" type="text" name="nombreProducto" required>

                        <label class="form-label" for="precio">Precio del Producto</label>
                        <input class="form-control" type="number" step="any" min="0" name="precio" required>

                        <label class="form-label" for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="imagen" name="imagen" required>

                        <label class="form-label" for="descripcion">Descripcion del Producto</label>
                        <textarea  class="form-control" type="text" name="descripcion" required></textarea>
                        <br>

                        <button type="submit" class="btn btn-primary" name="nuevoProducto">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>