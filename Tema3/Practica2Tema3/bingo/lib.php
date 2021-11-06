<?php

    function pintarCarton($carton,$quien) {
        echo "Carton: ";
        //print_r($carton);
        echo "<br>";
        $bingo=0;
        for ($i=0; $i < 3; $i++) { 
            
            for ($j=0; $j < 5; $j++) { 
               if ($carton[$i][$j][1] == true) {
                echo "<del>{$carton[$i][$j][0]}</del>&nbsp;"; //TACHA LAS BOLAS ACERTADAS
                } else {
                echo "{$carton[$i][$j][0]}&nbsp;";
                }
            }
            if (comprobarLinea($carton[$i])) { //COMPRUEBA CADA LINEA Y LA MARCA EN CASO DE QUE SE ACIERTEN TODAS LAS BOLAS
                echo "<strong>------LINEA-------</strong>";
     
                $bingo++; //SUMA UNO AL CONTADOR PARA COMPROBAR EL BINGO
            }
            echo "<br>";
           if ($bingo == 3) {
               $_SESSION['bingoGanador'] = true;
               
               echo "<strong>------¡GANADOR!-------</strong>"; //SI EL CONTADOR DE BINGO LLEGA A 3 (LAS 3 LINEAS) TE MARCA BINGO
               if ($quien == "jugador") {
                   $_SESSION['jugadorGanador'] = true;
               }
           }
        }
        echo "<br>";
    }

    function pintarBolas($bolas) {
        $cont = 0;
        foreach($bolas as $valor) {
            echo "{$valor}&nbsp;";
            $cont++;
            if ($cont % 20 == 0)
                echo "<br>";

        }
        echo "<br>";
    }


    function marcarBola($numero, &$array) {

        foreach($array as &$fila) { //Necesita la referencia para modificar el valor en la sesión
            foreach ($fila as &$bola) {
                if ($bola[0] == $numero) {
                    $bola[1] = true;
                }
            }
            
        }

    }

    function comprobarLinea($linea){ //COMPROBAMOS CADA LINEA, SI LLEGA A 5 ACIERTOS, DEVUELVE TRUE
        $contNum = 0;
            foreach ($linea as $value) {
                if ($value[1] == true) {
                    $contNum++;
                }
            }
            if ($contNum == 5) {
                return true;
            }  
    }
?>
