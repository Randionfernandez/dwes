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

        function pOpcionales($p1, $p2) {
            echo "paramentro1: $p1";
            echo "paramentro2: $p2";
        }

        // Qué sucede si en la llamada a la función omitimos parámetros
        pOpcionales("Llamada 1. Enviando solo este parámetro<br/>");
        // Qué sucede si enviamos más parámetros de los definidos
        pOpcionales("<br/>Llamada 2. Enviando 3 parámetros parámetros<br/>", 
                "Segundo par. ", "Tercer parámetro<br/>");
        ?>
    </body>
</html>
