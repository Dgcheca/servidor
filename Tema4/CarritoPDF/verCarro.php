<?php
session_start();
include "lib.php";
include "cabecera.php";

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
    <main>

        <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Subtotal</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['carrito'])) {
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $key => $producto) {
                            $productos = leerArchivo();
                            $datos = buscar($producto["id"], $productos);
                            $total += $producto['cant'] * $datos[1];

                            echo "<tr>";
                            echo "  <td>{$datos[0]}</td>";
                            echo "  <td>{$producto['cant']}</td>";
                            echo "  <td>{$datos[1]}€</td>";
                            echo "  <td>" . $producto['cant'] * $datos[1] . "€</td>";
                            echo "  <td><a href='controlador.php?accion=borrar&id=" . $producto['id'] . "'>";
                            echo "
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg>        
            ";
                            echo "      </a></td>";
                            echo "</tr>";
                    ?>
                    <?php
                        }
                        echo "<tr>";
                        echo "<td>Total</td><td></td><td></td>";
                        echo "<td colspan='2'><strong>{$total}€</strong></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmar">Confirmar</button>

        </div>

    </main>

    <!----------------------------------------MODAL------------------------------------------------------>
    <div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="confirmarlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarlabel">Datos de la Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action='controlador.php' method='post'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Dirección">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="pais" name="pais" required placeholder="País">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required placeholder="Ciudad">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="pdf">Confirmar Compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>