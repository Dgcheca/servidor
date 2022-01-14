<?php

class VistaEditarContacto
{
  private $html;

  public function __construct()
  {
    $this->html = "";
  }
  public function render($contacto)
  {
    $this->html .= '<!DOCTYPE html>
<html lang="en">
<head>
  <title>AGENDA con ficheros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imgs/contacto.png" sizes="256x256" type="image/png"> 
  <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container" style="margin-top:50px">
    <form class="" action="enrutador.php" method="get">
       <div class="row">
         <div class="col-md-6">
           <label class="form-label">Nombre</label>
           <input type="text" class="form-control" name="nombre" value="'.$contacto->getNombre().'" required>
         </div>
         <div class="col-md-6">
         <label class="form-label">Apellidos</label>
         <input type="text" class="form-control" name="apellidos" value="'.$contacto->getApellidos().'" required>
       </div> </div>
       <div class="row">
       <div class="col-md-6">
       <label class="form-label">Email</label>
       <input type="text" class="form-control" name="email" value="'.$contacto->getEmail().'" required>
     </div>
     <div class="col-md-6">
     <label class="form-label">Movil</label>
     <input type="text" class="form-control" name="movil" value="'.$contacto->getMovil().'" required>
   </div></div>
   
      <input type="hidden" name="id" value="'.$contacto->getId().'">
      <div class="row">
      <div class="col-2">
        <button class="btn btn-primary" type="submit" name="accion" value="inicio">Volver</button>
      </div>
      <div class="col-2">
        <button class="btn btn-primary" type="submit" name="accion" value="confirmarEditar">Editar</button>
      </div></div>
    </form>
       
      
  </div>';
    echo $this->html;
  }


  /**
   * Get the value of html
   */
  public function getHtml()
  {
    return $this->html;
  }

  /**
   * Set the value of html
   *
   * @return  self
   */
  public function setHtml($html)
  {
    $this->html = $html;

    return $this;
  }
}
