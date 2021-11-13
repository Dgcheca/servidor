<?php
session_start();
//session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diccionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .table {
            margin: 0 auto;
            text-align: center;
            width: 40%;
        }

        .table th {
            color: black;
            background-color: grey;
        }

        .table tr {
            background-color: lightgrey;
        }
    </style>
</head>

<body>

    <!-- Navegador -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="controlador.php?busqueda=reinicio" method="get">
                <h2>Dicionario</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#palabraNueva">Palabra Nueva</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#borrarPalabra">Borrar Palabra</button>
                    </li>
                    <li class="nav-item">

                        <a href="controlador.php?busqueda=mostrarTodo" method="get" class="btn">Mostrar Todo</a>

                    </li>
                    <li class="nav-item">
                        <form class="d-flex" action="controlador.php" method="POST">
                            <input class="form-control me-2" type="search" name="palabra" placeholder="Buscar Traduccion" aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit" name="buscarPalabra">Buscar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navegador Fin -->

    <!-- Estructura de la tabla -->

    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table tablesorter " id="">
                        <?php
                            if (isset($_GET['mensaje'])) {
                                echo "<h5 class='text-danger'>{$_GET['mensaje']}</h5>";
                            }
                        ?>
                            <thead class=" text-primary">
                         
                                <tr>
                                    <th>Español</th>
                                    <th>Inglés</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['busqueda'])) {
                                    foreach ($_SESSION['busqueda'] as $palabra) {
                                        echo "<tr><td>$palabra[0]</td><td>$palabra[1]</td></tr>";
                                    }
                                } else {
                                    //LO DEJA EN BLANCO
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Estructura de la tabla Fin -->

    <!-- Modal Ingresar -->
    <div class="modal fade" id="palabraNueva" tabindex="-1" aria-labelledby="palabraNuevaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="palabraNuevaLabel">Palabra Nueva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="controlador.php" method="post">
                        <input type="text" name="palabra" placeholder="En Castellano">
                        <input type="text" name="traduccion" placeholder="En Ingles">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" name="nuevaPalabra" class="btn btn-primary">Ingresar Palabra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Borrar -->
    <div class="modal fade" id="borrarPalabra" tabindex="-1" aria-labelledby="borrarPalabraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrarPalabraLabel">Borrar Palabra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="controlador.php" method="post">
                        <input type="text" name="palabra" placeholder="Palabra a borrar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" name="borrarPalabra" class="btn btn-primary">Borrar Palabra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>