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
            <h2>ALUMNOS</h2>
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <?php
                  $etiquetas = array_keys($_SESSION['alumnos'][0]);
                  foreach ($etiquetas as $etiqueta) {
                    echo "<th>{$etiqueta}</th>";
                  }
                  echo "<th>Acciones</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($_SESSION['alumnos'] as $alumno) {
                  echo "<tr>";
                  foreach ($alumno as $value) {
                    echo "<td>$value</td>";
                  }
                  echo "<td><a href='controlador.php?accion=borrarAlumno&email={$alumno['email']}'><i class='fas fa-fw fa-trash-alt'></i></a>";
                  echo '<a href="#" data-bs-toggle="modal" data-bs-target="#ModalEditarAlumno" class="">Editar</a></td>';
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
            <!-- MODAL PARA INSERTAR ALUMNOS -->

            <button type="button" class="btn btn-primary"><a href="#" data-bs-toggle="modal" data-bs-target="#ModalInsertarAlumno" class="nav-link px-2 text-white">INSERTAR ALUMNO</a></button>
            <div class="modal fade" id="ModalInsertarAlumno" tabindex="-1" aria-labelledby="ModalInsertarAlumnoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="" id="ModalInsertarAlumnoLabel">Añadir Alumnos</h5>
                  </div>
                  <form action="controlador.php" method="post">
                    <div class="modal-body">
                      <div class="mb-3">

                        <input type="text" name="nombre" class="form-control">
                        <label>Apellidos</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Nombre</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="etapa" class="form-control">
                        <label>Edad</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="anio" class="form-control">
                        <label>DNI</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Email</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Localidad</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Telefono</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <label>Curso</label>
                      </div>

                      <input type="hidden" name="accion" value="insertarAlumno">
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
            <!-- FIN DEL MODAL PARA INSERTAR ALUMNOS -->

            <!-- MODAL PARA EDITAR ALUMNOS -->
            <div class="modal fade" id="ModalEditarAlumno" tabindex="-1" aria-labelledby="ModalEditarAlumnoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="" id="ModalEditarAlumnoLabel">Editar Alumno</h5>
                  </div>
                  <form action="controlador.php" method="post">
                    <div class="modal-body">
                      <div class="">
                        <input type="text" name="apellidos" class="form-control" value="<?= $alumno['apellidos']; ?>" id="floatingInput">
                        <label for="floatingInput">Apellidos</label>
                      </div>
                      <div class="">
                        <input type="text" name="nombre" class="form-control" value="<?= $alumno['nombre']; ?>" id="floatingInput">
                        <label for="floatingInput">Nombre</label>
                      </div>
                      <div class="mb-3">
                        <input type="number" name="edad" class="form-control" value="<?= $alumno['edad']; ?>" id="floatingInput">
                        <label for="floatingInput">Edad</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="DNI" class="form-control" value="<?= $alumno['DNI']; ?>" id="floatingInput">
                        <label for="floatingInput">DNI</label>
                      </div>
                      <div class="mb-3">
                        <input disabled type="email" name="email" class="form-control" value="<?= $alumno['email']; ?>" id="floatingInput">
                        <label for="floatingInput">Email</label>

                      </div>
                      <input type='hidden' name='email' value='<?= $alumno['email']; ?>'>
                      <div class="mb-3">
                        <input type="text" name="localidad" class="form-control" value="<?= $alumno['localidad']; ?>" id="floatingInput">
                        <label for="floatingInput">Localidad</label>
                      </div>
                      <div class="mb-3">
                        <input type="tel" name="telefono" class="form-control" value="<?= $alumno['telefono']; ?>" id="floatingInput">
                        <label for="floatingInput">Móvil</label>
                      </div>
                      <div class="mb-3">
                        <input type="tel" name="curso" class="form-control" value="<?= $alumno['curso']; ?>" id="floatingInput">
                        <label for="floatingInput">Curso</label>
                      </div>
                      <div class="mb-3">

                      <!-- //Me crashea dentro del modal
                      <select name="curso"> 
                          foreach ($_SESSION('cursos') as $curso) {
                            if (strcmp($alumno['curso'], $curso) == 0)
                              echo "<option value='{$curso}' selected>{$curso}</option>";
                            else
                              echo "<option value='{$curso}'>{$curso}</option>";
                          }
                        </select>
                        -->
                      </div>
                      <input type="hidden" name="accion" value="modificarAlumno">
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
            <!-- FIN DEL MODAL PARA EDITAR ALUMNOS -->
          </div>
        </div>
      </div>

      <footer class="">

      </footer>
    </div>
  </div>
</body>

</html>