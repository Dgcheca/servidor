<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>   
    <STRONG>EJERCICIO 1</STRONG><br>
    Partiendo de 2 variables $primera y $segunda con valores aleatorios, hacer una<br>
    página PHP que calcule y muestre por pantalla:<br>
    - la diferencia de $primera menos $segunda<br>
    - la división de $primera entre $segunda<br>
    Añade un comentario que explique la función de generar números aleatorios<br>
</p>

    <?php
        $primera = random_int(1,10);
        $segunda = random_int(1,10);

        echo "primera " . $primera;
        echo "<br>";
        echo "segunda " . $segunda;
        echo "<br>";
        echo "primer numero menos el segundo " . $primera - $segunda;
        echo "<br>";
        echo "primer numero dividido por el segundo " . $primera / $segunda;
    
        //random_int pide 2 numeros, el minimo y el maximo, y genera un numero entero al azar entre esos dos
    ?>
<p>

    random_int pide 2 numeros, el minimo y el maximo, y genera un numero entero al azar entre esos dos

</p>


<strong>EJERCICIO 2</strong><br>
<p>
2. Tenemos dos cadenas $cadena1 con valor "hola a todo el mundo" y $cadena2 con<br>
valor "mi nombre es "nombre y apellidos del alumno". Se pide:<br>
- $cadena3 contendrá el valor de la concatenación de $cadena1 y $cadena2,<br>
mostrar por pantalla el contenido de $cadena3<br>
- $cadena1 contendrá el resultado de la concatenación de sí misma con<br>
$cadena2, mostrar por pantalla el contenido de $cadena1<br>
</p>

    <?php
        $cadena1 = "Hola a todo el mundo";
        $cadena2 = "mi nombre es Daniel Gomez Checa";
        $cadena3 = $cadena1 . " " . $cadena2;
        echo $cadena3, "<br>";
        $cadena1 .= " $cadena2";
        echo $cadena1, "<br>";
    ?>

<br>

<strong>EJERCICO 3</strong><br>
<p>
Tenemos el radio de un circulo almacenado en la variable $radio obtenida de <br>
forma aleatoria, calcular y mostrar por pantalla el volumen de una esfera de ese <br>
radio. <br></p>

<?php

    $radio = rand(1,10);
    echo "El radio de la esfera es: $radio <br>";
    $esfera = 4/3 * pi() * pow($radio, 3);
    echo "El volumen de la esfera según su radio es: $esfera <br>";

?>
<br>

<strong>EJERCICIO 4</strong> <br>
<p>
Tenemos los coeficientes de una ecuación de 2º grado (ax2 + bx + c = 0) en tres <br>
variables $a, $b y $c, muestra la ecuación y sus soluciones. Si no existen, debe <br>
indicarse por pantalla. <br>
</p>

<?php
//con valores base para hacerlo mas claro
    $a = 2;
    $b = 3;
    $c = 1;
    if (((pow($b, 2) - 4* $a * $c) < 0) || $a == 0) { //si $a == 0 no seria una ecuacion de segundo grado, pero bueno
        echo "Esa equacion es una liada <br>";
    } else {
        $x = sqrt(pow($b, 2) - 4* $a * $c);
    $xpositiva = (-$b + $x )/2 * $a;
    $xnegativa = (-$b - $x )/2 * $a;
 
    echo "Positivo: $xpositiva <br>";
    echo "Negativo: $xnegativa <br>";
}
?><br>

<strong>EJERCICIO 5</strong> <br>
<p>
Tenemos una variable $numero que tiene un número de 0 a 99. Mostrarlo escrito.<br>
Por ejemplo, para 56 mostrar: cincuenta y seis.<br>
</p>
<?php
    $decenas = array("","diez","veint", "treinta","cuarenta", "cincuenta","sesenta","setenta","ochenta","noventa");
    $unidades = array("cero","uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve");
    $excepciones = array(1 =>"once",2=> "doce",3 =>"trece",4 =>"catorce",5 =>"quince",6 =>"dieciseis",7 =>"diecisiete",8 =>"dieciocho",9 =>"diecinueve");
    $numero = "".rand(0,99);

    if ($numero > 9) {
        if ($numero >10 && $numero <=19) { //esto me saca las excepciones del 1, que al ser tan diferentes van en un array aparte
                foreach ($excepciones as $excepcion => $valor){
                    if ($numero[1] == $excepcion){
                        $texto = $valor;
                    }
                }

        }else if ($numero >=20 && $numero <=29) { //esto hace el montaje aparte del veinte
            foreach ($decenas as $decena => $valor) {
                if($numero[0] == $decena){
                    $texto = $valor;
                }
            } 
            foreach ($unidades as $unidad => $valor) { //veint+i+unidad
                if($numero[1] == $unidad && $numero[1]>0){
                    $texto .= "i" .$valor;
                } else if ($numero[1] == $unidad && $numero[1] = 0){
                    $texto .= "e"; //veint+e
                }
            } 
        } else { //esto saca el resto de numeros de forma normal
            foreach ($decenas as $decena => $valor) {
                if($numero[0] == $decena){
                    $texto = $valor;
                }
            } 
            foreach ($unidades as $unidad => $valor) {
                if($numero[1] == $unidad && $numero[1]>0){
                    $texto .= " y " .$valor;
                }
            } 
        }
    }  else if ($numero <10 && $numero >=0) { //esto saca las unidades individualmente
        foreach ($unidades as $unidad => $valor) {
            if ($numero == $unidad) {
                $texto = $valor;
            }
        } 
    }
    echo $numero . "<br>"; 
    echo $texto . "<br>";
?><br>

<strong>EJERCICIO 6</strong><br>
<p>
Dado un DNI guardado en una variable $dni, obtener la letra y mostrar por<br>
pantalla el DNI completo DNI-LETRA. El documento nacional de identidad DNI en<br>
España consta de un numero de 8 cifras y de una letra. La letra del DNI se obtiene<br>
a partir de los números como describen los pasos siguientes:<br>
- Calcular el resto de dividir el número de DNI entre 23<br>
- El número obtenido esta entre 0 y 22. Seleccionar una letra asociada a dicho<br>
número en la siguiente tabla:<br>
0 -> T, 1 -> R, 2 -> W, 3 -> A, 4 -> G, 5 -> M, 6 -> Y, 7 -> F, 8 -> P, 9 -> D, 10 -> X, 11 -><br>
B, 12 -> N, 13 -> J, 14 -> Z, 15 -> S, 16 -> Q, 17 -> V, 18 -> H, 19 -> L, 20 -> C, 21 -> K,<br>
22 -> E<br>
</p>
<?php

    $dninumero = 75717103;
    $dniletra = array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");

    foreach($dniletra as $indice => $valor){
        if ($dninumero %23 == $indice) {
            $dnicompleto = "$dninumero" . "$valor";
        }
    }
    echo $dnicompleto . "<br>";
?><br>

<strong>EJERCICIO 7</strong><br>
<p>
Hacer una página PHP que para un array de 5 elementos muestre por pantalla la <br>
tabla de multiplicar de dichos elementos (del 1 al 10) (for o while) <br>
</p>

<?php

    $testarray = array(1,2,3,4,5);
    foreach ($testarray as $posicion => $numero){
        for ($i=1 ; $i <= 10; $i++) { 
            echo "$numero * $i = " .$numero * $i .", ";
        }
        echo "<br>";
    }

?><br>

<strong>EJERCICIO 8</strong><br>
<p>
Crea un generador aleatorio de apuesta de la Lotería Primitiva. Cada vez que <br>
recargues la página aparecerá una combinación diferente. <br>
</p>

<?php

    $loteria = array();

    while (count($loteria) < 6) { 
        $numero = rand(1, 49);
        $contiene = in_array($numero,$loteria);
        if ( !$contiene) {
            array_push($loteria, $numero);
        }
    }
    sort($loteria);
    foreach ($loteria as $key => $value) {
        echo $value . " ";
    }
    echo "<br>";
?><br>

<strong>EJERCICIO 9</strong>
<p>
Realiza un programa que pinte 5 círculos en horizontal cada uno de un color <br>
diferente aleatorio.<br>
Puedes usar la función SVG circle para dibujar los círculos.<br>
</p>

    <?php
    
    for ($i=0; $i<=4 ; $i++) { 
    $colores = rand(0,255).", ".rand(0,255).", ".rand(0,255);
     echo  "<svg height='100' width='100'>";
     echo  "<circle cx='50' cy='50' r='40' stroke='black' stroke-width='3' fill='rgb($colores)'/>";
     echo  "</svg> ";
 
    }
    ?><br>

<strong>EJERCICIO 10</strong>
<p>
Rellena un array de 10 números enteros, con los 10 primeros números naturales.<br>
Calcula la media de los que están en posiciones pares y muestra los impares por<br>
pantalla.<br>
</p>

<?php

$numeros = array();
$mediapares = 0;
$contador = 0;
for ($i=1; $i <=10 ; $i++) { 
    array_push($numeros, $i);
}

echo "Los numeros de las posiciones impares son: ";
for ($i=0; $i <10 ; $i++) { 
    if ($i%2==0) {
        $mediapares += $i;
        $contador++;
    } else {
        echo "$numeros[$i], ";
    }
}
echo "<br>";
$media = $mediapares/$contador;
echo "Y la media de las posiciones pares es: $media <br>" ;


?><br>


<strong>EJERCICIO 11</strong>
<p>
Crea un array 7x7 con valores numéricos aleatorios excepto las diagonales que<br>
deben ser 1. A continuación muestra el array y después genera un vector que<br>
contenga la suma de cada fila y otro con la suma de cada columna.<br>
</p>

<?php
    $arraycruz = array();
   
    
    for ($i=0; $i < 7; $i++) { 
        $arraycifra = array();
        for ($j=0; $j < 7; $j++) {            
            if ($i + $j == 6 || $i == $j) {
                array_push($arraycifra,1);
            } else {
                array_push($arraycifra,rand(22,99));
            }
        }
        array_push( $arraycruz,$arraycifra);
    }
    foreach ($arraycruz as $peque) {
        foreach ($peque as $key => $value) {
            echo "[$value]";
        }
        echo " " . array_sum($peque);
        echo "<br>";
        
    }
    
  /*    //Este me ha dejado pillado.
    for ($i=0; $i < 7 ; $i++) { 
        $suma = 0;
        foreach ($arraycruz as $peque) {
            $suma += array_push($arraycruz[$i]);
        }
        echo "[$suma]";
    }
   */
 
?><br>

<strong>EJERCICIO 12</strong>
<p>
Haz un diccionario de palabras español a inglés (20 palabras mínimo) con un array<br>
asociativo. Haz un programa que dada una palabra compruebe si está en el<br>
diccionario y si es así que muestre la traducción, y si no está que indique que no<br>
está en el diccionario. A continuación, muestra el diccionario ordenador en<br>
español<br>
</p><br>

<?php
    $dicesp = array("hola" => "hello", "adios" => "bye","uno" => "one","dos" => "two",
                    "y" => "and","nuevo" => "new","bien" => "well","bueno" => "good",
                    "trabajo" => "work","pensar" => "think","entonces" => "then","solo" => "only",
                    "algo" => "some","tomar" => "take","casa" => "house","ir" => "go",
                    "quien" => "who","arriba" => "up","abajo" => "down","que" => "what");

    $palabra = "hola";
    $encontrada = false;
    $seccion = array();
    
    foreach ($dicesp as $key => $value) {
        if ($palabra == $value || $palabra == $key) {
            $encontrada = true;
            $seccion = array($key => $value);
        }
    }

    if ($encontrada == true) {
        print_r($seccion); //mostar el contenido a lo bruto
        echo "<br>";
    } else {
        echo "Esa palabra no se encuentra en el diccionario o no esta bien escrita.<br>";
    }

    echo "<br>";
    echo "DICCIONARIO COMPLETO<br>";
    foreach ($dicesp as $key => $value) { //mostrar el contenido bonico
        echo $key . " = " . $value . ".<br>";
    }

?><br>

<strong>EJERCICIO 13</strong>
<p>
Implementa una cola (FIFO: primero en entrar primero en salir) con php. Crear las<br>
funciones para añadir o eliminar n elementos en la cola, para vaciar la cola y para<br>
mostrar el contenido de la cola. Con esas funciones haz un programa en el que se<br>
pueda apreciar claramente el funcionamiento de la cola llamando a todas las<br>
funciones implementadas<br>
</p><br>

<?php



?><br>

<strong>EJERCICIO 14</strong>
<p>
Crea un array de notas de alumnos. Cada elemento del array debe contener las<br>
notas de un alumno, incluyendo nombre, materia y nota. Haz un programa con 10<br>
notas de alumnos. Luego debes mostrar las notas ordenadas en orden<br>
descendente por alumno, luego ordenadas por nombre, luego mostrar la nota<br>
media del curso, y el número de alumnos suspensos<br>
</p><br>

<?php



?><br>

</body>
</html>