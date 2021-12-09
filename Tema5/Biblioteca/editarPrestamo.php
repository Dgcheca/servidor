<?php
session_start();


include("header.php");
include("lib.php");


$prestamo = cargarPrestamoID($_GET['id']);
?>


<form class="row g-3" action="controlador.php" method="POST">

    <div class="col-md-4">
        <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
        <input type="text" class="form-control" name="fechaInicio" value="<?= $prestamo["fecha_inicio"] ?>" disabled>
    </div>
    <div class="col-md-4">
        <label for="fechaFin" class="form-label">Fecha de Fin</label>
        <input type="date" class="form-control" name="fechaFin" value="<?= $prestamo["fecha_fin"] ?>" required>
    </div>
    <div class="col-md-4">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" name="estado" value="<?= $prestamo["estado"] ?>" required>
            <option value="activo">Activo</option>
            <option value="devuelto">Devuelto</option>
            <option value="sobrepasado1Mes">Sobrepasado 1 Mes</option>
            <option value="sobrepasado1Anio">Sobrepasado 1 Año</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= $prestamo["nombre"] ?>" disabled>
    </div>
    <div class="col-md-6">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="<?= $prestamo["titulo"] ?>" disabled>
    </div>
    <input type="hidden" name="usuarioId" value="<?= $prestamo["usuarioId"] ?>">
    <input type="hidden" name="libroId" value="<?= $prestamo["libroId"] ?>">
    <input type="hidden" class="form-control" name="id" value="<?= $prestamo["id"] ?>" required>
    <button type="submit" class="btn text-white bg-secondary col-1" name="accion" value="guardarPrestamoEditado">
        Editar
    </button>
    </div>
</form>

<?php
include("footer.php");
?>