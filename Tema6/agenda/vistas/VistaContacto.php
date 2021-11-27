<?php

class VistaContacto {
    private $html;

    public function __construct(){
        $this->html = "";
    }

    public function render($agenda){
        $this->html.='
        <!DOCTYPE html>
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
<body style="height:1500px">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Agenda</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#" data-toggle="modal" data-target="#insertar">Insertar</a>
      </li>
      <li><a href="#" data-toggle="modal" data-target="#borrarTodo">Borrar todo</a></li>
    </ul>
  </div>
</nav>

        <div class="container" style="margin-top:50px">
        <p></p>
        <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Móvil</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>';
       
        foreach($agenda as $valores) {
            $this->html.='
              <tr>
              <th scope="row">'.$valores->getId().'</th>
              <td>'.$valores->getNombre().'</td>
              <td>'.$valores->getApellidos().'</td>
              <td>'.$valores->getEmail().'</td>
              <td>'.$valores->getMovil().'</td>
              <td><a  class="mx-3 text-danger" href="enrutador.php?accion=borrarContacto&id='.$valores->getId().'">X</a><a class="mx-3 text-success" href="enrutador.php?accion=editarContacto&id='.$valores->getId().'">E</a></td>
              </tr> 
        ';
          }
          $this->html.='
        </tbody>
        </table>
      
    </div>
    
    <!------------ MODAL ----->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Insertar Contacto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="enrutador.php" method="get">
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
            </div>

            <div class="form-group row">
                <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="apellidos" name="apellidos">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="movil" class="col-sm-2 col-form-label">Móvil</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="movil" name="movil">
                </div>
            </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="accion" value="insertar" class="btn btn-primary">Guardar</button>
      </div>
    </form>   <!--Cerrar form -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="borrarTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Borrar Contactos</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="enrutador.php" method="get">
            
            <div class="form-group row">
                <label for="movil" class="col-sm-10 col-form-label">¿Está seguro de esta acción?</label>
            </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="accion" value="borrarTodo"class="btn btn-primary">Sí</button>
      </div>
    </form>   <!--Cerrar form -->
    </div>
  </div>
</div>

';

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
