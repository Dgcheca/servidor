<?php
//sesion
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    //funcion que busca un id
    function buscar($id, $productos){
        foreach ($productos as $producto) {
            if ($producto['id'] == $id) {
                return array($producto['nombre'], $producto['precio']);
            }
        }

    }
    $productos = array(
        array("id" => "", "nombre" => "", "descripcion" => "", "precio" => "", "imagen" => ""),
        array("id" => "", "nombre" => "", "descripcion" => "", "precio" => "", "imagen" => ""),
        array("id" => "", "nombre" => "", "descripcion" => "", "precio" => "", "imagen" => ""),
        array("id" => "", "nombre" => "", "descripcion" => "", "precio" => "", "imagen" => ""),
        array("id" => "", "nombre" => "", "descripcion" => "", "precio" => "", "imagen" => "")
    );
    ?>


    <form action="controlador.php" method="post">  
        <input type="hidden" name="id" value="<?=$producto['id']?>"> 
    <button type="submit" name="comprar" class = "">Comprar</button>
    <input type="number" name="cantidad">
    </form>
</body>
</html>