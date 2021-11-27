<?php
session_start();
include("header.php");
include("lib.php");
?>


<div class="d-flex flex-wrap align-items-center mt-5">
    <ul class="nav col-12 me-lg-auto mb-3 justify-content-right">
        <li><h1 class="H1 col-1 mb-3 me-3">USUARIOS</h1></li>
        <li><a href="controlador.php?accion=mostrarTodosUsuarios" method="get" class="btn px-2 mr-3 btn-secondary">Mostrar Todo</a></li>
        <li><button type="button" class="btn px-2 mr-3 btn-secondary" data-toggle="modal" data-target="#nuevoUsuario">Añadir nuevo</button></li>
    </ul>
</div>

<?php
if (isset($_SESSION['busquedaUsuarios'])) { //EXPERIMENTO PARA PINTAR LA BUSQUEDA DESDE LA SESION
    echo pintarUsuarios($_SESSION['busquedaUsuarios']); // Y LUEGO UNSET LA SESION PARA ELIMINAR LOS DATOS 
    unset($_SESSION['busquedaUsuarios']); //AL MOVERSE ENTRE PESTAÑAS O RECARGAR
} else {
    //LO DEJA EN BLANCO
}


?>

<!-------------------------------MODAL---------------------------------------------------------->
<div class="modal fade" id="nuevoUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoUsuarioLabel">Añadir Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="controlador.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" name="dni" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" required>
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="poblacion" class="form-label">Poblacion</label>
                            <input type="text" class="form-control" name="poblacion" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn text-white bg-secondary" name="accion" value="incluirNuevoUsuario">
                    Crear
                </button>
            </div>
            </form>
        </div>

    </div>


</div>



<?php
include("footer.php");
?>