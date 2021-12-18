<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservasRestaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="row" class="row opciones text-center my-5"> 
        <div class="col-4">
            <form class="form">
                <div class="row">
                    <div class="col-6"> <input type='date' class="form-control" name='fechaBusqueda' id="fechaBusqueda" value=""></div>
                    <!--HAY QUE PERFILAR LO DE DEJAR EL CALENDARIO EN BLANCO-->
                    <div class="col-6"> <button type="button" class="btn btn-danger" id='reservasPorFecha' name='reservasPorFecha' value="">Cambiar</button></div>
                </div> 
            </form>
            </div>
            <div class="col-4">
                <button id="nuevaReserva" class="btn btn-danger">Nueva Reserva</button>
            </div>
            <div class="col-4">
                <input class="form-control" type="text" placeholder="Buscar Reserva" aria-label="Search" name="buscarReservas" id="buscarReservas"> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="soloActivos">
                    <label class="form-check-label" for="soloActivos">Mostrar Solo Activos</label>
                    <!--NO FUNCIONA-->
                </div>
            </div>
         
        </div>

        <div id="pantallaPrincipal">

            <?php
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
            $reservas = $_SESSION['reservas'];
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


        }

            ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>

    window.addEventListener("load", inicio);
    async function inicio() { 
        //Botón de fuera - RESERVAS POR FECHA
        document.getElementById("reservasPorFecha").addEventListener("click", async function(e) {
            const datos = new FormData(); 
            let fecha = document.getElementById('fechaBusqueda')
            datos.append("accion","reservasPorFecha"); 
            datos.append("fecha",fecha.value);
            
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
        });
        
        //Botón de fuera - BUSCAR EN RESERVAS
        document.getElementById("buscarReservas").addEventListener("keyup", async function(e) {
            e.preventDefault();
            let buscar = e.target;
            const datos = new FormData(); 
            datos.append("accion","buscarReservas");
            datos.append("texto",buscar.value);
            
            
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
            document.getElementById("pantallaPrincipal").innerHTML = await response.text(); //Lo que devuelve la Vista
        });
        
        //Botón de dentro - EDITARRESERVAS
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {
            let botonEditar = e.target.closest("button[id=editarReserva]");
            if (botonEditar){
            const datos = new FormData(); 
            datos.append("accion","editarReserva"); 
            datos.append("id",botonEditar.value);
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
            }
        });
         //Botón de dentro - CANCELARRESERVA
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {
            let botonCancelar = e.target.closest("button[id=cancelarReserva]");
            if (botonCancelar){
            const datos = new FormData(); 
            datos.append("accion","cancelarReserva"); 
            datos.append("id",botonCancelar.value);
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
            }
        });
            //Botón de fuera - NUEVA RESERVA
        document.getElementById("nuevaReserva").addEventListener("click", async function(e) {
            e.preventDefault();
            let buscar = e.target;
            const datos = new FormData(); 
            datos.append("accion","nuevaReserva");
            
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
            document.getElementById("pantallaPrincipal").innerHTML = await response.text(); //Lo que devuelve la Vista
        });
              //Botón de dentro - INSERTARRESERVA
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {
            let botonInsertar = e.target.closest("button[id=insertarReserva]");
            if (botonInsertar){
            const datos = new FormData(); 
            datos.append("accion","insertarReserva"); 
            datos.append("form",insertarReserva.value);
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
            }
        });
     
    }
        
    </script>
</body>

</html>