<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ordenación</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        /**
         * En este ejemplo se usan las assertions para probar el código.
         * Es recomendable usar PHPUnit
         */
        //    phpinfo();
        require_once 'Ordenacion.php';

        $casos = [
            [],
            [23],
            [2, 17],
            [17, 2],
            [3, 8, 2],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            [20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
            [13, 34, 56, 5, 4, 3, 2, 1],
            [9, -6, 3, 1, 0, -12, 24, 31, 45, -52, 68, 9, -80, -19],
        ];

        $ordenar = new Ordenacion();

        // Active assert and make it quiet
        // Estas 3 opciones son validas para PHP5. En PHP7 se utilizan directivas-- ver assert en manual php.net
        assert_options(ASSERT_ACTIVE, 1);
        assert_options(ASSERT_WARNING, 0);
        assert_options(ASSERT_QUIET_EVAL, 1);
        // Set up the callback
        assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// Create a handler function
        function my_assert_handler($file, $line, $code, $desc = null) {
            echo "<p>Assertion failed at $file:$line: $code </p>";
            if ($desc) {
                echo ": $desc";
            }
            echo "\n";
        }

        $i = 0;
        $num_metodos = count($ordenar->metodos);  // Calcula el número de métodos de ordenación de la clase.

        /**
         * Garantizando valor de la directiva zend.assertions para que genere código la función assert.
         *    Antes podiamos indicar       ini_set('zend.assertions', 1);
         * 
         * A partir de php 7.0 esta directiva debe indicarse exclusivamente en el php.ini.
         *         zend.assertions = 1
         * si queremos que compile código para la función assert.
         */
        foreach ($casos as $A) {

            $B = $A;
            sort($B);
            echo '<b>Caso: ' . $i . '</b></br/>';

            for ($j = 0; $j < $num_metodos; $j++) {
                $C = $ordenar->{$ordenar->metodos[$j]}($A); // El método debe recibir $A por copia y no por referencia.

                /* En PHP7 verificar que la directiva zend.assertions=1 o no evaluará la expresión del assert 
                 * retornando siempre TRUE
                 */
                if (assert($B === $C, "Algoritmo {$ordenar->metodos[$j]} erróneo<br/>")) {
                    echo '***  Ok ' . $ordenar->metodos[$j] . '<br/>';
                } else {
                    echo "Algoritmo {$ordenar->metodos[$j]} erróneo<br/>";
                }
            }
            $i++;
        }
        echo "<h1>Fin del test</h1>";
        ?>
    </body>
</html>
