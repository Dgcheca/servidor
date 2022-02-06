<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&D Combat Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-secondary ">
    
    <div class="row m-1 text-center bg-dark">
            <div class="col-12">
                <h1 class="m-5 text-danger">D&D Combat Generator</h1>
            </div>
        </div>

    <div class="container-flex m-5" id="container">
  
        <div class="row">
            <div class="col-2">
                <div class="navegador">
                    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
                        <hr class="bg-warning">
                        <ul class="nav nav-pills flex-column mb-auto ">
                            <li class="nav-item">
                                <button class="nav-link link-warning" id="inicio" value="">
                                   <p class="">Inicio</p>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link link-warning" id="empezar" value="">
                                   <p class="">Crear Nuevo</p>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link link-warning" id="historial" value="">
                                    <p class="">Historial Personajes</p>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row m-5" style="min-height: 450px;" id="opciones"></div>
            </div>
        </div>
    </div>
    <footer class="bg-dark footer m-1 p-5 text-center text-secondary">
        <div class="row">
            <div class="col-8">
            <p class="">Ejemplo del uso de apis para DWES</p>
            </div>
            <div class="col-4">
            <p class="">DgCheca</p>
            </div>
        </div>
        
    </footer>
</body>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     window.addEventListener("load", inicio);
    async function inicio() {
        document.getElementById("empezar").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion", "empezar");
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("opciones").innerHTML = await response.text();
        });
        document.getElementById("inicio").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion", "inicio");
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("opciones").innerHTML = await response.text();
        });
        document.getElementById("historial").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion", "verhistorial");
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("opciones").innerHTML = await response.text();
        });
   

        document.getElementById("opciones").addEventListener("click", async function(e) {
                let botonverdatos = e.target.closest("button[name=verdatos]");
                if (botonverdatos) {
                    const datos = new FormData();
                    datos.append("accion", "verdatos");
                    datos.append("id", botonverdatos.id);

                    const response = await fetch("enrutador.php", {
                        method: 'POST',
                        body: datos
                    });

                    document.getElementById("opciones").innerHTML = await response.text();
                }
            });
        document.getElementById("opciones").addEventListener("click", async function(e) {
            let volverraza = e.target.closest("button[id=volverRaza]");
            if (volverraza) {
                const datos = new FormData();
                datos.append("accion", "empezar");
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });

                document.getElementById("opciones").innerHTML = await response.text();
            }
        });
        document.getElementById("opciones").addEventListener("click", async function(e) {
            let botonelegirraza = e.target.closest("button[name=elegirRaza]");
            if (botonelegirraza) {
                const datos = new FormData();
                datos.append("accion", "elegirRaza");
                datos.append("id", botonelegirraza.id )
                datos.append("url", botonelegirraza.url )
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });
                document.getElementById("opciones").innerHTML = await response.text();
            }
        });
        document.getElementById("opciones").addEventListener("click", async function(e) {
            let botonverclase = e.target.closest("button[name=verdatosclase]");
            if (botonverclase) {
                const datos = new FormData();
                datos.append("accion", "verDatosClase");
                datos.append("id", botonverclase.id )
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });
                document.getElementById("opciones").innerHTML = await response.text();
            }
        });

        document.getElementById("opciones").addEventListener("click", async function(e) {
            let botonvolverclases = e.target.closest("button[id=volverClases]");
            if (botonvolverclases) {
                const datos = new FormData();
                datos.append("accion", "verClases");
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });
                document.getElementById("opciones").innerHTML = await response.text();
            }
        });
        
        document.getElementById("opciones").addEventListener("click", async function(e) {
            let botonelegirclase = e.target.closest("button[name=elegirClase]");
            //let formularionombre = document.getElementById("formularioNombre")
            if (botonelegirclase) {
                //let formularionombre = document.getElementById("formularioNombre")
                //let datosocultos = document.getElementById("datosocultos");
                const datos = new FormData();
                datos.append("accion", "elegirClase");
                datos.append("id", botonelegirclase.id);
                datos.append("url", botonelegirclase.url);
                //datos.append("nombrepj",formularionombre.value);
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });
                document.getElementById("opciones").innerHTML = await response.text()
                
            }
        });
        document.getElementById("opciones").addEventListener("click", async function(e) {
            let botonelegirclase = e.target.closest("button[id=terminar]");
            let formularionombre = document.getElementById("formularioNombre")
            if (botonelegirclase && formularionombre.value) {
                const datos = new FormData();
                datos.append("accion", "terminar");
                datos.append("nombrepj", formularionombre.value);
                const response = await fetch("enrutador.php", {
                    method: 'POST',
                    body: datos
                });
                document.getElementById("opciones").innerHTML = await response.text()
                
            }
        });
}
</script>

</html>