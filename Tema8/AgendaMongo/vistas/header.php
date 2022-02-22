<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CriptoPortal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>CriptoPortal</h1>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button type="button" id="vertodas" class="btn btn-primary">Ver todas</button>
            </div>
   
            
        </div>
        <div class="row">
            <div id="resultado"></div>
        </div>
    </div>
</body>


<script>
     window.addEventListener("load", inicio);
    async function inicio() {
        document.getElementById("vertodas").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion", "vertodas");
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   
          document.getElementById("resultado").innerHTML = await response.text();
        });
    
    }
   
</script>
</html>