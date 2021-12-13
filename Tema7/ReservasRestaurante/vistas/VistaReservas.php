<?php

    class VistaReservas{
        public static function render(){
            include("cabecera.php");

        }
        public static function renderBusqueda(){
            $reservas = $_SESSION['reservas'];
            $mesasUsadasComida = array();
            $mesasUsadasCena = array();
            foreach ($_SESSION['reservas'] as $value) {
                if($value->getTurno() == "Comida"){
                    array_push($mesasUsadasComida,$value->getIdMesa());
                } else if ($value->getTurno() == "Cena"){
                    array_push($mesasUsadasCena,$value->getIdMesa());
                }
            }
            if (count($reservas) > 0){
                        //HAY QUE ARREGLAR LA ID DE LAS MESAS
                    echo '<table class="table table-striped my-5"><thead><th>Mesas libres para hoy</th></thead><tbody><tr><th>COMIDA</th>';
                    for ($i=0; $i < 10; $i++) { 
                        if (in_array($i, $mesasUsadasComida)){ 
                            echo '<td class="text-danger">Mesa '.$i.'</td>';
                        }else {
                            echo '<td class="">Mesa '.$i.'</td>';
                        }
                    }
                    echo '<tr><th>CENA</th>';
                    for ($i=0; $i < 10; $i++) { 
                        if (in_array($i, $mesasUsadasCena)){
                            echo '<td class="text-danger">Mesa '.$i.'</td>';
                        }else {
                            echo '<td class="">Mesa '.$i.'</td>';
                        }
                    }
                    echo ' <table class="table table-striped my-5"><thead><tr><th>ID</th><th>NOMBRE</th><th>APELLIDOS</th>
                    <th>EMAIL</th><th>MOVIL</th><th>FECHA</th><th>TURNO</th><th>HORA</th><th>NPERSONAS</th><th>ESTADO</th>
                    <th>IDMESA</th><th>ACCIONES</th></thead><tbody>';


                foreach ($reservas as $reserva) {

                    echo '<tr><td>' . $reserva->getId() . '</td>';
                    echo '<td>' . $reserva->getNombre() . '</td>';
                    echo '<td>' . $reserva->getApellidos() . '</td>';
                    echo '<td>' . $reserva->getEmail() . '</td>';
                    echo '<td>' . $reserva->getMovil() . '</td>';
                    echo '<td>' . $reserva->getFecha() . '</td>';
                    echo '<td>' . $reserva->getTurno() . '</td>';
                    echo '<td>' . $reserva->getHora() . '</td>';
                    echo '<td>' . $reserva->getNPersonas() . '</td>';
                    echo '<td>' . $reserva->getEstado() . '</td>';
                    echo '<td>' . $reserva->getIdMesa() . '</td>';
                    echo "<td><button id='editarReserva' accion='editarReserva' value='{$reserva->getId()}' class='btn btn-success m-1'>E</button>";
                    echo "<button id='cancelarReserva' accion='cancelarReserva' value='{$reserva->getId()}' class='btn btn-danger m-1'>X</button></td>";
                    echo '</tr>';
                }

                echo '</tbody></table>';
            }else{
                echo '<div class="display-1 text-center text-danger"> ninguna reserva para ese dia </div>';
            }
        }

        public static function renderEditarReserva($reserva){
            echo "<form id='editarReserva' class='row g-3 needs-validation'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Nombre</label>";
            echo "    <input type='text' class='form-control' name='nombre' value='".$reserva->getNombre()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Apellidos</label>";
            echo "    <input type='text' class='form-control' name='apellidos' value='".$reserva->getApellidos()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Email</label>";
            echo "    <input type='text' class='form-control' name='email' value='".$reserva->getEmail()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Movil</label>";
            echo "    <input type='text' class='form-control' name='movil' value='".$reserva->getMovil()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Fecha</label>";
            echo "    <input type='text' class='form-control' name='fecha' value='".$reserva->getFecha()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Turno</label>";
            echo "    <input type='text' class='form-control' name='turno' value='".$reserva->getTurno()."' disabled>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Hora</label>";
            echo "    <input type='text' class='form-control' name='hora' value='".$reserva->getHora()."' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Numero de Personas</label>";
            echo "    <input type='text' class='form-control' name='npersonas' value='".$reserva->getNPersonas()."' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Estado</label>";
            echo "   <select class='form-control' name='estado' id='estado' value='".$reserva->getEstado()."' required>'>
                        <option value='Activa'>Activa</option>
                        <option value='Cancelada'>Cancelada</option>
                        <option value='Finalizada'>Finalizada</option>
                    </select> ";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Mesa</label>";
            echo "    <input type='text' class='form-control' name='idMesa' value='".$reserva->getIdMesa()."' disabled>";
            echo "  </div>";
            echo "<input type='hidden' name='id' value='".$reserva->getId()."'>";
            echo "  <div class='col-12'>";

    
            echo "    <button accion='modificarReserva' class='btn btn-primary' type='submit'>Confirmar</button>";
         
            
            echo "  </div>";
            echo "</form>";
        }
        public static function renderNuevaReserva(){
            echo "<form id='insertarReserva' class='row g-3 needs-validation'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Nombre</label>";
            echo "    <input type='text' class='form-control' name='nombre' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Apellidos</label>";
            echo "    <input type='text' class='form-control' name='apellidos' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Email</label>";
            echo "    <input type='text' class='form-control' name='email' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Movil</label>";
            echo "    <input type='text' class='form-control' name='movil' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Fecha</label>";
            echo "    <input type='text' class='form-control' name='fecha' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Turno</label>";
            echo "    <input type='text' class='form-control' name='turno' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Hora</label>";
            echo "    <input type='text' class='form-control' name='hora' value='' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Numero de Personas</label>";
            echo "    <input type='text' class='form-control' name='npersonas' value='' required>";
            echo "  </div>";
            echo "      <div class='col-md-5'>";
            echo "  </div>";
            echo "  <div class='col-12'>";
            echo "    <button accion='insertarReserva' class='btn btn-primary' type='submit'>Confirmar</button>";
            echo "  </div>";
            echo "</form>";
        }
    }
    

?> 

