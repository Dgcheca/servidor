</div> <!-- FIN DEL AREA DE JUEGO -->
</div> <!-- FIN CONTAINER -->';

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
    window.addEventListener("load", inicio);
    //Función que escucha los eventos
    function inicio() {
        /*  
        document.getElementById("opciones").addEventListener("click", async function(e)  {
            e.preventDefault(); //Para no enviar el form

            let pedirCarta = e.target.closest("button[accion=pedirCarta]");
		    if (pedirCarta) {
                const datos = new FormData(); //Lo mandamos siempre con POST
                datos.append("accion","pedirCarta"); //Acción para que PHP sepa de donde vienen la petición HTTP
                datos.append("id",pedirCarta.value);
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });                
                //Tratar la respuesta
                document.getElementById("pantallaPrincipal").innerHTML = await response.text(); //Lo que devuelve la Vista
		    }
        });
   


        document.getElementById("opciones").addEventListener("click", async function(e) {
            const datos = new FormData(); //Lo mandamos siempre con POST
            datos.append("accion", "pedirCarta");
            const response = await fetch("enrutador.php", {
                method: 'POST',
                body: datos
            });
            document.getElementById("pantallaPrincipal").innerHTML = await response.text(); //Lo que devuelve la Vista            
        });
 */
    }
        
</script>

</body>

</html>