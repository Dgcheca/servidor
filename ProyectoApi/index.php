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
    //Ejemplo GET api sin key
        $url = "https://www.dnd5eapi.co/api/spells/";
        $resultado = file_get_contents($url, false);
        if ($resultado === false) {
            echo "Error haciendo petición";
            exit;
        }
        echo $resultado;
    ?>
</body>
</html>