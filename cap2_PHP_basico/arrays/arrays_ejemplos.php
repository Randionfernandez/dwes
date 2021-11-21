<!doctype html>
<!--
Distintos ejemplos sobre arrays
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body class='container'>
        https://openwebinars.net/academia/aprende/test-driven-development/2169/
        <?php
        // Creando matrices
        echo '<h2>Creando matrices de índice numérico</h2>';
        $matriz1 = array();

        var_dump($matriz1);

        echo '<h2>Inicializando matrices de índice numérico</h2>';
        $mimatriz = array(0 => 1, 1 => 2);
        var_dump($mimatriz);

        // o bien
        $mimatriz = array(1, 2,);
        var_dump($mimatriz);

        // o bien
        $mimatriz[0] = 1;
        $mimatriz[1] = 2;

        echo '$mimatriz(0)=1;';
        var_dump($mimatriz);

        //Recorriendo matrices
        foreach ($mimatriz as $key => $value) {
            echo "El valor del elementos $key es $value <br/>";
        }

        //También podemos escribir lo mismo sin $key
        foreach ($mimatriz as $value) {
            echo "Valor: $value<br/>";
        }

        //
        // Creando matrices de índice asociativo
        //
        echo '<h2>Creando matrices de índice asociativo</h2>';
        $alumnos = array('Garcia' => 24, "Montse$mimatriz[0]" => 32, 'Carlos' => 27);
        var_dump($alumnos);

        echo '<p>Añadiendo un índice numérico<br/>';
        $alumnos[] = 'Periquito';
        var_dump($alumnos);

        // CASOS ESPECIALES
        echo '<h2>Casos especiales de índice</h2>';
        //$especial[08] = "indice numérico 08"; // Genera un Parse error
        $especial["8"] = 'indice es un string "8", conversión a entero 8';
        $especial["08"] = "indice es un string 08";
        $especial["O8"] = "indice con letra O mayúscula, un string O8";
        $especial[null] = "indice nulo";
        var_dump($especial);

// ARRAYS  MULTIDIMENTSIONALES
        echo '<h2>Arrays multidimensionales</h2>';
        $matriculas = array(
            'Levi' => array()
        );

        echo '<h2>Arrays multidimensionales.- matriculas</h2>';
        var_dump($matriculas);
        $matriz = array(
            array(3, 5, 7),
            array(8, 6, 4),
            array(1, 9, 2)
        );
        var_dump($matriz);

        echo '<h2>Arrays animales</h2>';
        $animales = array(
            "altura" => "Gato",
            'peso' => 44,
            "Jirafa" => "Jirafa"
        );
        var_dump($animales);

        $variable = "nombre";
        $literal1 = 'Mi $variable no se imprimirá<br/>';
        $literal2 = 'Mi $variable no se imprimirá<br/>';

        echo $variable . ' ' . $literal1 . ' ' . $literal2;

        $multilinea = "Esto es una cadena
        multilínea, aunque si usas un IDE, tenderá a
        provocar una concatenación por línea.
        Pruébalo en tu IDE.";
        echo $multilinea;
        ?>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    </body>
</html>
