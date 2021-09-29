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
        $cadena1 .= "$cadena2";
        echo $cadena1, "<br>";
    ?>

</body>
</html>