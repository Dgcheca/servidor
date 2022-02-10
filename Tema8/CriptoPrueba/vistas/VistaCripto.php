<?php
    class VistaCripto{
        static function Render(){
            include ("header.php");
        }

        static function renderCriptos($results) {
            foreach ($results as $result) {
                var_dump($result);
            }
        }


    }



?>