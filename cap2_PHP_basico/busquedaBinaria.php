<!doctype html>
<!--
Ejercicio Capítulo 2.- Búsqueda binaria (o dicotómica)
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
        error_reporting(E_ALL);
        $lista_ordenada = array(2, 4, 16, 35, 46, 63);
        $min = 0;
        $max = count($lista_ordenada) - 1;
        $buscado = -20;

        while ($min <= $max) {
            $central = (int) (($min + $max) / 2);
            if ($buscado > $lista_ordenada[$central]) {
                $min = $central + 1;
            } elseif ($buscado < $lista_ordenada[$central]) {
                $max = $central - 1;
            } elseif ($buscado == $lista_ordenada[$central]) {
                break;
            }
        }

        if ($lista_ordenada[$central] == $buscado) {
            echo "El número $buscado está en la posición $central";
        } else {
            echo "El número $buscado no está en la lista";
        }
        ?>
    </body>
</html>
