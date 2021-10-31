<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Ies Jaroso
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />

    <style>
      .container {
          width: 400px;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <div class="container">
        <main class="form-signin m-3">
        <form action="controlador.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Registro</h1>
            <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
            <input type="text" name="nombre" class="form-control" id="floatingNombre" placeholder="Nombre">
            <label for="floatingNombre">Nombre</label>
            </div>
            <div class="form-floating">
            <input type="text" name="ciudad" class="form-control" id="floatingCiudad" placeholder="Ciudad">
            <label for="floatingCiudad">Ciudad</label>
            </div>
            <div class="form-floating">
            <input type="text" name="estado" class="form-control" id="floatingEstado" placeholder="Estado">
            <label for="floatingEstado">Interino o Funcionario</label>
            </div>
            <div class="form-floating">
              <select class="form-select" name="especialidad" aria-label="Default select example">
                  <option value="lengua">Lengua</option>
                  <option value="matematicas">Matemáticas</option>
                  <option value="fisica">Física</option>
                  <option value="ingles">Inglés</option>
                  <option value="informatica">Informática</option>
              </select>
            </div>
            <!-- Esto va a ser para decidir si estamos tratando el login o el registro 
                 desde el controlador 
            -->
            <input type="hidden" name="accion" value="registro">
            <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Registrar</button>
            <a href="registro.php"><button class="w-100 btn btn-lg btn-primary" type="reset">Limpiar</button></a>
           
        </form>
        </main>
    </div>
    
  </body>
</html>