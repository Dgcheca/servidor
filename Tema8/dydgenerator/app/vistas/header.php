<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&D Combat Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-dark text-warning">
    
        <div class="row text-center bg-secondary">
            <div class="col-12">
                <h1 class="m-5 ">D&D Combat Generator</h1>
            </div>
        </div>
    

    <div class="container-flex m-5 " id="container">
       
        <div class="row">
            <div class="col-2">
                <div class="navegador">
                    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                            <button class="nav-link link-light" id="inicio" value="">
                                   <p class="text-warning">Inicio</p>
                                </button>
                                <button class="nav-link link-light" id="empezar" value="">
                                   <p class="text-warning">Crear Nuevo</p>
                                </button>
                                <button class="nav-link link-light" id="historial" value="">
                                    <p class="text-warning">Historial Personajes</p>
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
    <footer class="bg-secondary footer mt-5 p-5 text-center">
        <div class="row">
            <div class="col-8">
            <p class="text-dark">Ejemplo del uso de apis para DWES</p>
            </div>
            <div class="col-4">
            <p class="text-dark">DgCheca</p>
            </div>
        </div>
        
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
     window.addEventListener("load", inicio);
    async function inicio() {

        document.getElementById("empezar").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion", "empezar");
          
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("opciones").innerHTML = await response.text();
        });
    }
</script>
</html>