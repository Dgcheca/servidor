<?php
session_start();
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .modal-content {
      background-color: #1e1e2f;
    }
  </style>

</head>

<body class="">
  <div class="wrapper">
    <div class="main-panel">
      <?php
      include "nav.php";
      ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <table class="table tablesorter " id="">
              <h2>CURSOS</h2>

              <thead class=" text-primary">
                <tr>
                  <?php

                  $etiquetas = array_keys($_SESSION['cursos'][0]);
                  foreach ($etiquetas as $etiqueta) {
                    echo "<th>{$etiqueta}</th>";
                  }
                  echo "<th>Acciones</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($_SESSION['cursos'] as $curso) {
                  echo "<tr>";
                  foreach ($curso as $value) {
                    echo "<td>$value</td>";
                  }
                  echo "<td><a href='controlador.php?accion=borrarCurso&id={$curso['id']}'><i class='fas fa-fw fa-trash-alt'></i></a>";
                  echo '<a href="#" data-bs-toggle="modal" data-bs-target="#ModalEditarCurso" class="">Editar</a></td>';
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

            <!-- MODAL PARA INSERTAR CURSOS -->

            <button type="button" class="btn btn-primary"><a href="#" data-bs-toggle="modal" data-bs-target="#ModalInsertarCurso" class="nav-link px-2 text-white">INSERTAR NUEVO CURSO</a></button>
            <div class="modal fade" id="ModalInsertarCurso" tabindex="-1" aria-labelledby="ModalInsertarCursoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalInsertarCursoLabel">Añadir Curso</h5>
                  </div>
                  <form action="controlador.php" method="post">
                    <div class="modal-body">
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Nombre</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="etapa" class="form-control">
                        <label>Etapa</label>
                      </div>
                      <div class="mb-3">
                        <input type="number" name="fecha" class="form-control">
                        <label>Año</label>
                      </div>
                      <input type="hidden" name="accion" value="insertarCurso">
                    </div>
                    <div class="modal-footer">
                      <div class='row'>
                        <div class='col-2'>
                          <button class="btn btn-primary" type="submit">Insertar</button>
                          <button class="btn btn-primary" type="reset">Deshacer</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FIN DEL MODAL PARA INSERTAR CURSOS -->

            <!-- MODAL PARA EDITAR CURSOS -->
            <div class="modal fade" id="ModalEditarCurso" tabindex="-1" aria-labelledby="ModalEditarCursoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="" id="ModalEditarCursoLabel">Editar Curso</h5>
                  </div>
                  <form action="controlador.php" method="post">
                    <div class="modal-body">
                
                        <input type="hidden" name="id" class="form-control" value="<?= $curso['id']; ?>" id="floatingInput">
                      
                      <div class="">
                        <input type="text" name="nombre" class="form-control" value="<?= $curso['nombre']; ?>" id="floatingInput">
                        <label for="floatingInput">Nombre</label>
                      </div>
                      <div class="">
                        <input type="text" name="etapa" class="form-control" value="<?= $curso['etapa']; ?>" id="floatingInput">
                        <label for="floatingInput">Etapa</label>
                      </div>
                      <div class="mb-3">
                        <input type="number" name="fecha" class="form-control" value="<?= $curso['fecha']; ?>" id="floatingInput">
                        <label for="floatingInput">Año</label>
                      </div>
                      <input type="hidden" name="accion" value="modificarCurso">
                    </div>
                    <div class="modal-footer">
                      <div class='row'>
                        <div class='col-2'>
                          <button class="btn btn-primary" type="submit">Modificar</button>
                          <button class="btn btn-primary" type="reset">Deshacer</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FIN DEL MODAL PARA EDITAR CURSOS -->


          </div>
        </div>
      </div>
    </div>
    <footer class="footer">

      <?php
      include "footer.php";
      ?>
    </footer>
  </div>
  </div>
</body>

</html>