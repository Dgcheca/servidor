<?php
session_start();
include("header.php");
include("lib.php");

?>


<div class="d-flex flex-wrap align-items-center mt-5">
    <ul class="nav col-12 me-lg-auto mb-3 justify-content-right">
        <li>
            <h1 class="H1 col-1 mb-3 me-3">PRESTAMOS</h1>
        </li>
        <li><a href="controlador.php?accion=mostrarTodosPrestamos" method="get" class="btn px-2 mr-3 btn-secondary">Mostrar Todo</a></li>
        <li><button type="button" class="btn px-2 mr-3 btn-secondary" data-toggle="modal" data-target="#nuevoPrestamo">Añadir nuevo</button></li>
        <li>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="controlador.php" method="POST">
                <input type="hidden" name="accion" value="buscarPrestamo">
                <input type="search" class="form-control" name="busqueda" placeholder="Buscar" aria-label="Search" required>
            </form>
        </li>
    </ul>
</div>

<?php
if (isset($_SESSION['busquedaPrestamos'])) { //EXPERIMENTO PARA PINTAR LA BUSQUEDA DESDE LA SESION
    echo pintarPrestamos($_SESSION['busquedaPrestamos']); // Y LUEGO UNSET LA SESION PARA ELIMINAR LOS DATOS 
    unset($_SESSION['busquedaPrestamos']); //AL MOVERSE ENTRE PESTAÑAS O RECARGAR
} else {
    //LO DEJA EN BLANCO
}
?>

<!-------------------------------MODAL---------------------------------------------------------->
<div class="modal fade" id="nuevoPrestamo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="nuevoPrestamoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoPrestamoLabel">Nuevo Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="controlador.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="fechaInicio" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" required>
                    </div>
                    <div class="col-md-4">
                        <label for="fechaFin" class="form-label">Fecha de fin</label>
                        <input type="date" class="form-control" name="fechaFin" required>
                    </div>
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="">
                            <option value="activo">Activo</option>
                            <option value="devuelto">Devuelto</option>
                            <option value="sobrepasado1Mes">Sobrepasado 1 Mes</option>
                            <option value="sobrepasado1Anio">Sobrepasado 1 Año</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="usuario" id="">
                            <?= pintarUsuariosOpciones(); ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="libro" id="">
                            <?= pintarLibrosOpciones(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn text-white bg-secondary" name="accion" value="nuevoPrestamo">
                            Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>