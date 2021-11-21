<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php

        function paramDefault($param1, $param2 = 0, $param3 = "Hola Mundo") {
            echo "P1: $param1, ";
            echo "P2: $param2, ";
            echo "P3: $param3<br/>";
        }

        paramDefault(1);
        paramDefault(2, 4);
        paramDefault(3, 4, "Otra cadena");
        $a="Veamos";

        echo "<br/><p>Anadiendo valores null</p>";

        paramDefault(4, null, "Otra cadena");
        paramDefault(5, null, null);

        $f = new ReflectionParameter('paramDefault', 'param2');

        paramDefault(6, $f->getDefaultValue());


        /*
         * Un parámetro es opcional si lleva asociado un valor predeterminado (default).
         * 
         * Todos los parámetros que tengan valor predeterminado deben declararse después de los
         * parámetros que no tienen default.
         * 
         * 1) Cómo se pasa el valor default de un parámetro A, tal que permita que demos valor a los
         * siguientes parámetros default, pero no sabemos el valor default de A? 

         * 2) Qué pasa cuando
         */
        ?>
    </body>
</html>
