<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieDatabase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">

    <div class="container-flex m-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="m-5">MOVIE DATABASE</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="navegador">
                    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
                        <span class="fs-4">Géneros</span>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <button class="nav-link link-light" name="busqueda" id="drama" value="18">
                                    Drama
                                </button>
                            </li>
                            <li>
                                <button class="nav-link link-light" name="busqueda" id="accion" value="10759">
                                    Acción
                                </button>
                            </li>
                            <li>
                                <button class="nav-link link-light" name="busqueda" id="misterio" value="9648">
                                    Misterio
                                </button>
                            </li>
                            <li>
                                <button class="nav-link link-light" name="busqueda" id="comedia" value="35">
                                    Comedia
                                </button>
                            </li>
                            <li>
                                <button class="nav-link link-light" name="busqueda" id="cienciaficcion" value="10765">
                                    Ciencia Ficción
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row m-5" style="min-height: 450px;" id="listapeliculas"></div>
            </div>
    
        </div>
      
    </div>
    <footer class="bg-black footer mt-5 p-5 text-center">
        <div class="row">
            <div class="col-8">
            <p class="text-dark">Ejemplo del uso de apis para DWES</p>
            </div>
            <div class="col-4">
            <p class="text-dark">DgCheca</p>
            </div>
        </div>
        
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>