<?php
session_start();
include("header.php");
include("lib.php");
?>


<div class="d-flex flex-wrap align-items-center mt-5">
    <ul class="nav col-12 me-lg-auto mb-3 justify-content-right">
        <li><h1 class="H1 col-1 mb-3 me-3">LIBROS</h1></li>
        <li><a href="controlador.php?accion=mostrarTodosLibros" method="get" class="btn px-2 mr-3 btn-secondary">Mostrar Todo</a></li>
        <li><button type="button" class="btn px-2 mr-3 btn-secondary" data-toggle="modal" data-target="#nuevoLibro">Añadir nuevo</button></li>
        <li><form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="controlador.php" method="POST">
            <input type="hidden" name="accion" value="buscar">
                <input type="search" class="form-control" name="busqueda" placeholder="Buscar" aria-label="Search" required></form></li>
    </ul>
</div>

<?php
if (isset($_SESSION['busquedaLibros'])) {//EXPERIMENTO PARA PINTAR LA BUSQUEDA DESDE LA SESION
    echo pintarLibros($_SESSION['busquedaLibros']);// Y LUEGO UNSET LA SESION PARA ELIMINAR LOS DATOS 
    unset($_SESSION['busquedaLibros']);//AL MOVERSE ENTRE PESTAÑAS O RECARGAR
} else {
    //LO DEJA EN BLANCO
}


?>



<!-------------------------------MODAL---------------------------------------------------------->
<div class="modal fade" id="nuevoLibro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="nuevoLibroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoLibroLabel">Añadir Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="controlador.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="col-md-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
                    <div class="col-md-12">
                        <label for="subtitulo" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo" required>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">descripcion</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="col-md-12">
                        <label for="autor" class="form-label">autor</label>
                        <input type="text" class="form-control" name="autor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="editorial" class="form-label">editorial</label>
                        <input type="text" class="form-control" name="editorial" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cantidadTotal" class="form-label">Cantidad Total</label>
                        <input type="number" class="form-control" name="cantidadTotal" required>
                    </div>
                    <div class="col-md-6">
                        <label for="categoria" class="form-label">categoria</label>
                        <input type="text" class="form-control" name="categoria" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ISBN" class="form-label">ISBN</label>
                        <input type="text" class="form-control" name="ISBN" required>
                    </div>
                    <div class="col-md-12">
                        <label for="portada" class="form-label">portada</label>
                        <input type="file" name="portada">
                    </div>
                  
                    

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn text-white bg-secondary" name="accion" value="incluirNuevoLibro">
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
