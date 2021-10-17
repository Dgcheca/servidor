<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <strong>Ejercicio 1</strong><br>
    <p>
    Crea una cadena de texto con el texto “Lo que estoy escribiendo es un <br>
    string”. Crea una segunda cadena de texto “muuuuuy largo”.<br>
    Concatena las dos cadenas en una sóla y luego muéstrala. Llama a una<br>
    función que diga la posición de la primera ‘e’ y de la última ‘u’.<br>
    También calcula la posición de la palabra “texto”<br>
    </p>
    <?php
    function buscareu($cadena){
        $buscareumensaje1 = "Esa cadena no tiene ninguna e"; //mensajes iniciales en caso de que no encuentre ninguna letra
        $buscareumensaje2 = "Esa cadena no tiene ninguna u";

        $encontradae = false;
        for ($i=0; $i < strlen($cadena) ; $i++) { 
            if ($cadena[$i] == "e" && $encontradae == false) { //comprueba las "e"s si aun no ha encontrado ninguna
                $buscareumensaje1 = "La primera e aparece en la posicion: ".$i; //Cambia el mensaje inicial con la posicion de la primera
                $encontradae=true; //indica que ya ha encontrado una
            }
            if ($cadena[$i] == "u") {
                $buscareumensaje2 = "La ultima u aparece en la posicion: ".$i; //Cambia el mensaje inicial con la posicion de la ultima
            } 
        }
        echo $buscareumensaje1 . " y " . $buscareumensaje2; //devuelve los dos mensajes concatenados
    }
    $cadenatexto1 = "Lo que estoy escribiendo es un string";
    $cadenatexto2 = "muuuuuy largo";

    $cadenatexto1 .= " ".$cadenatexto2;
    echo $cadenatexto1;
    echo "<br>";
    
    buscareu($cadenatexto1);

    ?><br><br>

    <strong>Ejercicio 2</strong><br>
    <p>
    Crea un array de nombres de alumnos, que contengan nombre de al<br>
        menos 5 alumnos. A continuación, crea una función llamada<br>
        convierteAlumnos($nombres, $opcion)<br>
        donde el primer parámetro sea el array con los nombres de los alumnos,<br>
        y el segundo parámetro pueden ser tres opciones:<br>
    - “L”: transforma todos los strings del array $nombres a<br>
        minúsculas y lo devuelve.<br>
    - “U”: transforma todos los strings del array $nombres a<br>
        mayúsculas y lo devuelve.<br>
    - “M”: transforma todos los strings del array $nombres de<br>
        modo que la primera letra de cada nombre de empresa sea<br>
        mayúscula y el resto minúscula. Lo devuelve.<br>
        Muestra un ejemplo de la función con cada una de las diferentes opciones.<br>
    </p>
    <?php   
    function convierteAlumnos($nombres ,$opcion){
        $arrayfinal = array();
        if ($opcion == "L") {
            foreach ($nombres as $nombre) {
                array_push($arrayfinal, strtoupper($nombre)) ;
            }
        }
        if ($opcion == "U") {
            foreach ($nombres as $nombre) {
                array_push($arrayfinal, strtolower($nombre)) ;
            } 
        }
        if ($opcion == "M") {
            foreach ($nombres as $nombre) {

                array_push($arrayfinal, ucfirst(strtolower($nombre))) ;
            }
        }
        return $arrayfinal;
    }

    $alumnos = array("Uno","Dos","Tres","Cuatro","Cinco");
    print_r(convierteAlumnos($alumnos, "L"));
    echo "<br>";
    print_r(convierteAlumnos($alumnos, "U"));
    echo "<br>";
    print_r(convierteAlumnos($alumnos, "M"));
    echo "<br>";
    ?>

    <strong>EJERCICIO 3</strong>
    <P>
    Crea una cadena llamada $direccion_ip y asígnale una dirección ip como<br>
    192.168.11.200. A continuación, separa en un array con cada dígito de<br>
    la dirección ip, y muestra cada dígito por separado. Seguidamente<br>
    reconstruye en una cadena la dirección ip, pero que en lugar de separar<br>
    por puntos los dígitos aparezcan separados por dos puntos (:) y<br>
    muéstralo. [Pista: usar explode e implode]<br>
    </P>

    <?php

    $array_ip = array();
    $direccion_ip = "192.168.11.200";
    $array_ip = explode(".",$direccion_ip);

    foreach ($array_ip as $ip) {
        echo $ip . " ";
    }
    echo "<br>";
 
    $direccion_ip = implode(":", $array_ip);
    print_r($direccion_ip);
    echo "<br>";
    ?><br>

    <strong>EJERCICIO 4</strong>
    <p>Crear un array llamado $word_list_en con 40 palabras en inglés. Crea<br>
otro array llamado $word_list_es con las mismas 40 palabras en el<br>
mismo orden, pero en español. El ejercicio consiste en hacer un<br>
traductor literal de español a inglés o viceversa, es decir, creamos<br>
una variable con una cadena de texto, debe recorrerla y devolverla en<br>
el idioma traduciendo una por una las palabras (se supone que están<br>
en la misma posición en los arrays). Para la cadena de texto a<br>
traducir usa solo palabras de entre las 40 que has utilizado.<br></p>

    <?php

    $word_list_en = array("hello","bye","one","two","and","new","well","good","work","think",
    "then","only","some","take","house","go","who","up","down","what",
    "buy","icecream","flavour","chocolate", "please","want");

    $word_list = array("hola","adios","uno","dos","y","nuevo","bien","bueno","trabajo","pensar", 
    "entonces","solo","algo","tomar","casa","ir","quien","arriba","abajo","que",
    "comprar","helado","sabor","chocolate","por favor","quiero");

    $cadenatraducir = "hola quiero comprar helado sabor chocolate por favor";
    $cadenatraducida = "";
    $array_traduccion = explode(" ",$cadenatraducir);
    foreach ($array_traduccion as $palabra) {
        foreach ($word_list as $key => $value) {
            if ($value == $palabra ) {
                $cadenatraducida .= $word_list_en[$key] . " ";
            }
        }
    }
  
    echo $cadenatraducida . "<br>";
?><br>

<strong>EJERCICIO 5</strong>
<p>
Vamos a construir un encriptador y desencriptador de mensajes.<br>
Crearemos dos funciones:<br>
<br> 
- encriptar($mensaje,$clave)<br> 
donde el primer argumento sea el mensaje a encriptar<br>
el segundo argumento sea el número de letras a desplazar a la derecha<br>
por cada letra, por ejemplo, la b con $clave=3 se transformará en en la f.<br>
<br> 
La función devolverá el mensaje cifrado sustituyendo los<br>
espacios en blanco del final y cada letra del mensaje por la<br>
correspondiente según la clave.<br>
<br> 
- desencriptar($mensaje,$clave)<br>
donde el primer argumento sea el mensaje a encriptar el segundo argumento <br>
sea el número de letras a desplazar a la izquierda por cada letra, por ejemplo, la f<br>
con $clave=3 se transformará en en la b. La función devolverá el mensaje cifrado <br>
sustituyendo cada letra del mensaje por la correspondiente según la clave.<br>
<br> 
Para mostrar que lo has hecho bien encripta un mensaje y muéstralo,<br>
desencríptalo y muestra el mensaje que coincide con el original. Pista:<br>
busca y utiliza las funciones PHP para pasar un carácter a su<br>
correspondiente dígito ASCII y viceversa.<br>
</p>

    <?php
    function encriptar($mensaje,$clave){
        $mensajeEncriptado = "";
        for ($i=0; $i < strlen($mensaje) ; $i++) { 
           $mensajeEncriptado .= chr((ord($mensaje[$i]) + $clave)); 
        }//cambiamos letra a letra, primero con ord para pasarlo a ascii
        //luego lo sumamos y volvemos a convertirlo en letra con chr
        return $mensajeEncriptado;
    }
    function desencriptar($mensaje,$clave){
        $mensajeDesencriptado = "";
        for ($i=0; $i < strlen($mensaje) ; $i++) { 
           $mensajeDesencriptado .= chr((ord($mensaje[$i]) - $clave)); 
        }//lo mismo que al encriptar, pero restando
        return $mensajeDesencriptado;
    }

    $mensaje1 = "hola buenos dias";
    $mensaje2 = encriptar($mensaje1,1);
    $mensaje3 = desencriptar($mensaje2,1);

    echo $mensaje2 ."<br>";
    echo $mensaje3 ."<br>";
?> <br>

<strong>EJERCICIO 6</strong>
<p>
Mejora el programa anterior de tal manera que el mensaje original<br>
lo divida primero en un array de palabras considerando el espacio en<br>
blanco como separador únicamente. A continuación, debe poner cada<br>
palabra del revés (hola ->aloh). <br>
Seguidamente encriptará cada palabra usando la función del<br>
ejercicio anterior. Finalmente devolverá un string con cada palabra<br>
encriptada añadiendo un espacio en blanco entre cada palabra. El<br>
desencriptador hará lo contrario (y no digo más). Muestra el programa<br>
funcionando encriptando y desencriptando.<br>
</p>

<?php
    $array_encriptacion = explode(" ",$mensaje1); //separamos los cachos
    foreach ($array_encriptacion as $key => $value) {
        $array_encriptacion[$key] = encriptar(strrev($value),1); 
    } //cada palabra la sustituimos por ella misma invertida y luego encriptada
    $encriptadoDuro = implode(" ",$array_encriptacion); //volvemos a montar
    echo $encriptadoDuro;

    echo "<br>";

    $array_encriptacion = explode(" ",$encriptadoDuro);
    foreach ($array_encriptacion as $key => $value) {
        $array_encriptacion[$key] = desencriptar(strrev($value),1); 
    } //solo hay que repetir el proceso pero pasando el desencriptador
    $encriptadoDuro = implode(" ",$array_encriptacion);
    echo $encriptadoDuro . "<br>";
?><br>

<strong>EJERCICIO 7</strong>
<p>
7. Vamos a crear un programa que calcule el IVA de un carrito de la<br>
compra. El carrito será un array bidimensional asociativo de este tipo:<br>
(Puedes añadir más productos y más campos a tu elección) <br>
$carrito = array(<br>
array(“id” => 1234, “nombre” => “PS4”, “precio” => 349.95, “cant” => 2, “iva_r” => 0),<br>
array(“id” => 1235, “nombre” => “iPhone XS”, “precio” => 1249.95, “cant” => 1, “iva_r” => 0),<br>
array(“id” => 1236, “nombre” => “Chocolate”, “precio” => 9.95, “cant” => 5, “iva_r” => 1)<br>
)<br>
Deberéis crear una función llamada subtotal($linea_pedido) que calcule el<br>
precio de cada línea de pedido, multiplicando el precio por la cantidad y<br>
aplicando el iva correspondiente, si iva_r es 0 será del 21% y si iva_r es 1<br>
será del 10%.<br>
Mostrar en una tabla HTML el carrito de la compra (nombre, precio,<br>
cantidad y subtotal). En la última fila aparecerá el total del pedido a<br>
pagar.<br>
Se tendrá en cuenta la visualización y el estilo del carrito de la compra<br>
resultante.<br></p>

<?php
function subtotal($linea_pedido){
    $preciototal = 0;
    if ($linea_pedido["iva_r"] == 0) {
        $preciototal += ($linea_pedido["cant"] * $linea_pedido["precio"] * 1.21);
    } else {
        $preciototal += ($linea_pedido["cant"] * $linea_pedido["precio"] * 1.10);
    }
    return $preciototal;
}
$carrito = array(
array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
);

$compraTotal = 0;

    ?>
    <table width = 1024px style="border:solid">
        <tr bgcolor="grey" >
                <td>
                    <p>NOMBRE</p>
                </td>
                <td>
                    <p>PRECIO (SIN IVA)</p>
                </td>
                <td>
                  <p>CANTIDAD</p>
                </td>
                <td>
                  <p>SUBTOTAL</p>
                </td>
            </tr>
        <?php
        foreach ($carrito as $producto) {
        ?>
        <tr bgcolor="lightgrey" >
            <td>
                <?php
                echo $producto["nombre"];
                ?>
            </td>
            <td>
                <?php
                echo $producto["precio"];
                ?>
            </td>
            <td>
                <?php
                echo $producto["cant"];
                ?>
            </td>
            <td>
                <?php
                echo subtotal($producto);
                $compraTotal += subtotal($producto);
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
           <tr bgcolor="grey" >
            <td colspan="3">
                <p>TOTAL</p>
            </td>
            <td>
            <?php
                echo $compraTotal;
                ?>
            </td>
        </tr>
    </table><br>
</body>
</html>