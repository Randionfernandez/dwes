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

// ¿Podemos pasar una referencia como parámetro de función si el parámetro no fue definido como ref?
        function pasoPorReferencia($a) {
            $a*=2;
            $d = "Dede dentro vale $a*2";
            return $d;
        }

        $b = 3;

        $c = pasoPorReferencia(&$b);
        echo "Desde fuera b vale $c";
        // Dará un "Fatal error"
        ?>
    </body>
</html>
