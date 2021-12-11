<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
<body>
<div class="container">
    <div id='pantallaPrincipal'>     <!--PRINCIPIO DEL AREA DE JUEGO-->
    <div class="row text-center p-5">
        <div class="col justify-content-center">
          <!--PINTA EL LOGO DEL JUEGO AL ENTRAR (O AL CARGARTELO CON F5)-->
          <img class="img-fluid rounded mx-auto d-block logo" src="img/logo.png" alt="Responsive image">
        </div>
     
    </div>';
    <div id="opciones2" class="row opciones text-center my-5">
      <div class="col"><button id="nuevaPartida" class="btn btn-danger">Nueva Partida</button></div>
    </div>  


    
    </div> <!-- FIN DEL AREA DE JUEGO -->
  
</div> <!-- FIN CONTAINER -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    window.addEventListener("load", inicio);
    async function inicio() { 
        //Botón de fuera - Nueva partida
        document.getElementById("nuevaPartida").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion","nuevaPartida"); 
          
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("pantallaPrincipal").innerHTML = await response.text();
        });
   

        //Botón de dentro - Nueva partida
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {

          let botonNueva = e.target.closest("button[id=nuevaPartida2]");
          if (botonNueva){
            const datos = new FormData(); 
            datos.append("accion","nuevaPartida"); 
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
          }
         
        });
        //Botón de dentro - Plantarse
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {
          let botonPlantarse = e.target.closest("button[id=plantarse]");
          if (botonPlantarse){
            const datos = new FormData(); 
            datos.append("accion","plantarse"); 
            
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
          }
        });
        //Botón de dentro - pedirCarta
        document.getElementById("pantallaPrincipal").addEventListener("click", async function(e) {
          let botonCarta = e.target.closest("button[id=pedirCarta]");
          if (botonCarta){
            const datos = new FormData(); 
            datos.append("accion","pedirCarta"); 
            
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
            document.getElementById("pantallaPrincipal").innerHTML = await response.text();
          }
        });
      }
        
</script>

</body>

</html>