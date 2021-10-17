<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .contenedor{
            width: 1000px;
            background-color:beige;
            display: block;
            margin: auto;
        }
        .card{
            background-color: white;
            width: 200px; 
            height:300px; 
            border: solid; 
            display:inline-block;
            padding: 10px;
            margin:10px;
        }
        img{
            display: block;
            margin: 10px auto;
            width: 100px;
            height: 150px;
        }
        .card-text{
            height: 40px;
            font-size: 11px;
        }
        h5{
            height: 20px;
            font-size: 11px;
        }
        a{
            height: 20px;
        }
        h2 {
            color: blueviolet;
            margin-left: 20px;
        }
        h1{
            margin: 10px;
        }
    </style>

</head>
<body>
<strong>EJERCICIO 8</strong>
<p>. Vamos a crear una librería online, pero con los libros almacenados<br>
en un array asociativo. Los datos a guardar por cada libro son: ISBN,<br>
título, descripción, categoría, editorial, foto, precio.<br>
- La categoría puede ser: ciencias, cocina, deporte, novela,<br>
historia, scifi, negra, romántica.<br>
- El campo foto será una url en tu pc en la misma carpeta que esté<br>
el fichero php nos crearemos una carpeta imgs donde meteremos<br>
las imágenes de cada libro llamándolas con el isbn.jpg. El tamaño<br>
de cada imagen será aproximadamente 100x150px.<br>
- ISBN será un número de trece dígitos que se puede tratar<br>
como una cadena.<br>
- Precio será un float con dos decimales.<br>
A continuación, te muestro cómo debería quedar la visualización del array.<br>
Tienes que intentar que sea lo más parecido posible. Como mínimo deberás<br>
tener 15 libros, y mostrar 4 libros en cada fila. Los datos e imágenes de los<br>
libros deben ser lo más reales posible. Debes tener como mínimo 5 libros de<br>
novela histórica y 5 de novela negra, pero sólo mostraremos los 4 primeros<br>
de cada una de esas categorías.<br></p>

<?php
    $libreria = array(
        array("ISBN" => "1111111111111", "titulo" => "El Hombre en busca de Sentido", "descripcion" => "El estremecedor relato en el que Viktor Frankl nos narra su experiencia en los campos de concentración.", "categoria" => "Historia", "editorial" => "Herder", "foto" => "libros/2111111111111.jpg", "precio" => 22.50),
        array("ISBN" => "1111111111112", "titulo" => "Isabel II: Una biografía ", "descripcion" => "La llegada al trono de Isabel II, cuando aún era una niña", "categoria" => "Historia", "editorial" => "Taurus", "foto" => "libros/1111111111112.jpg", "precio" => 26.50),
        array("ISBN" => "1111111111113", "titulo" => "La forja de un rebelde", "descripcion" => "Uno de los testimonios más estremecedores sobre la guerra civil española", "categoria" => "Historia", "editorial" => "debolsillo", "foto" => "libros/1111111111113.jpg", "precio" => 47.77),
        array("ISBN" => "1111111111114", "titulo" => "TE ODIO", "descripcion" => "desgrana un amor apasionado lleno de obstáculos en la Inglaterra del siglo XIX", "categoria" => "Historia", "editorial" => "digital", "foto" => "libros/1111111111114.jpg", "precio" => 12.47),
        array("ISBN" => "1111111111115", "titulo" => "El telón de acero", "descripcion" => "La deslumbrante historia la creación del imperio soviético", "categoria" => "Historia", "editorial" => "debate", "foto" => "libros/1111111111115.jpg", "precio" => 26.50),
        array("ISBN" => "1111111111116", "titulo" => "La novia gitana", "descripcion" => "Susana Macaya desaparece tras su fiesta de despedida de soltera.", "categoria" => "Novela negra", "editorial" => "alfaguara", "foto" => "libros/1111111111116.jpg", "precio" => 18,90),
        array("ISBN" => "1111111111117", "titulo" => "Dónde enterré a Fabiana Orquera", "descripcion" => "Un crimen que nadie resolvió en treinta años", "categoria" => "Novela negra", "editorial" => "Autopublicado", "foto" => "libros/1111111111117.jpg", "precio" => 13.99),
        array("ISBN" => "1111111111118", "titulo" => "Los ladrones de Entrevientos", "descripcion" => "Entrevientos no ha cambiado.", "categoria" => "Novela negra", "editorial" => "Autopublicado", "foto" => "libros/1111111111118.jpg", "precio" => 17.99),
        array("ISBN" => "1111111111119", "titulo" => "La suerte del enano", "descripcion" => "Se puede capturar al criminal perfecto?", "categoria" => "Novela negra", "editorial" => "Suma", "foto" => "libros/1111111111119.jpg", "precio" => 18.90),
        array("ISBN" => "1111111111120", "titulo" => "Cuando florezca el espino blanco", "descripcion" => "Un pueblo en las montañas toscanas donde todos se conocen", "categoria" => "Novela negra", "editorial" => "Amazon", "foto" => "libros/1111111111120.jpg", "precio" => 22.20),
        array("ISBN" => "1111111111121", "titulo" => "El italiano", "descripcion" => "Pérez-Reverte logra una novela intensa", "categoria" => "Ficcion historica", "editorial" => "Alfaguara", "foto" => "libros/1111111111121.jpg", "precio" => 28.50),
        array("ISBN" => "1111111111122", "titulo" => "Harry Potter y la piedra filosofal", "descripcion" => "la magia es algo totalmente desconocido para Harry Potter.", "categoria" => "Juvenil", "editorial" => "Minalima", "foto" => "libros/1111111111122.jpg", "precio" => 30.40),
        array("ISBN" => "1111111111123", "titulo" => "El monstruo de colores", "descripcion" => "vuestro hijo podrá identificar con facilidad las distintas emociones que vive durante el día", "categoria" => "Infantil", "editorial" => "Pop-Up", "foto" => "libros/1111111111123.jpg", "precio" => 21.75),
        array("ISBN" => "1111111111124", "titulo" => "Lore", "descripcion" => "Un giro brillante de la mitología clásica que te quitará el aliento", "categoria" => "Fantasia", "editorial" => "Puck", "foto" => "libros/1111111111124.jpg", "precio" => 19.50),
        array("ISBN" => "1111111111125", "titulo" => "Orígenes Helados", "descripcion" => "Un misterio. Una gran amenaza. Un Continente Helado", "categoria" => "Fantasia", "editorial" => "Una", "foto" => "libros/1111111111125.jpg", "precio" => 20.80),
        array("ISBN" => "1111111111126", "titulo" => "Mentira", "descripcion" => "Xenia lucha por sacar las mejores notas", "categoria" => "Jovenes", "editorial" => "Periscopio", "foto" => "libros/1111111111126.jpg", "precio" => 9.97),

    );
   
    $categoria = "";

    ?>
<div class="contenedor">
    <h1><strong>LIBRERÍA JAROSO 2021</strong></h1><br>
    <?php
    foreach ($libreria as $libro) {
        
    if ($categoria != $libro["categoria"]) { //con este if comprueba cada categoria y muestra un maximo de 4 sea la que sea
        ?>
        <h2 class="categoria"><?php echo $libro["categoria"] ?></h2> 
        <?php //si es la primera vez que entra la categoria, la escribe como titulo
        $categoria = $libro["categoria"]; //con esto cambiamos el comprobador cuando entra una nueva
        $categoriaContador = 0; //contador que se reinicia con cada cambio de categoria
    } else {
        $categoriaContador++; //y llevamos la cuenta de los libros si se repite categoria
    }
        if ($categoriaContador <4) { //y aqui ajustamos el maximo permitido
?>
    <div class="card">
    <img src=<?php echo "$libro[foto]" ?> class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text"><?php echo "$libro[descripcion]" ?></p>
            <h5 class="card-title"><?php echo "$libro[titulo]" ?></h5>
            <h4 class="card-text"><?php echo "$libro[precio]€" ?></h4>
        </div>
    </div>
<?php
        }
    }
?>
<h6>Por: Daniel Gomez Checa</h6>
</div>
</body>
</html>