<?php
session_start();


include("header.php");
include("lib.php");


            
            $libro = cargarLibroID($_GET['id'])[0];
?>


<form class="row g-3" action="controlador.php" method="POST"  enctype="multipart/form-data">

    <div class="col-md-12">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="<?=$libro["titulo"]?>" required>
    </div>
    <div class="col-md-12">
        <label for="subtitulo" class="form-label">Subtitulo</label>
        <input type="text" class="form-control" name="subtitulo" value="<?=$libro["subtitulo"]?>" required>
    </div>
    <div class="col-md-12">
        <label for="descripcion" class="form-label">descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="<?=$libro["descripcion"]?>" required>
    </div>
    <div class="col-md-12">
        <label for="autor" class="form-label">autor</label>
        <input type="text" class="form-control" name="autor" value="<?=$libro["autor"]?>" required>
    </div>
    <div class="col-md-6">
        <label for="editorial" class="form-label">editorial</label>
        <input type="text" class="form-control" name="editorial" value="<?=$libro["editorial"]?>" required>
    </div>
    <div class="col-md-3">
        <label for="cantidadTotal" class="form-label">Cantidad Total</label>
        <input type="number" class="form-control" name="cantidadTotal" value="<?=$libro["cantidadTotal"]?>" required>
    </div>
    <div class="col-md-3">
        <label for="cantidadTotal" class="form-label">Cantidad Disponible</label>
        <input type="number" class="form-control" name="cantidadDispo" value="<?=$libro["cantidadDispo"]?>" required>
    </div>
    <div class="col-md-6">
        <label for="categoria" class="form-label">categoria</label>
        <input type="text" class="form-control" name="categoria" value="<?=$libro["categoria"]?>" required>
    </div>
    <div class="col-md-6">
        <label for="ISBN" class="form-label">ISBN</label>
        <input type="text" class="form-control" name="ISBN" value="<?=$libro["ISBN"]?>" required>
    </div>
    <div class="col-md-12">
        <label for="portada" class="form-label">portada</label>

        <input type="file" name="portada" value=""><?='<img class="img-fluid max-width:100% img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($libro["portada"]).'"/>'?>
    </div>
    <input type="hidden" class="form-control" name="id" value="<?=$libro["id"]?>" required>
    <button type="submit" class="btn text-white bg-secondary col-1" name="accion" value="guardarLibroEditado">
            Editar
        </button>
    </div>
 
      
   
</form>

<?php
include("footer.php");
?>