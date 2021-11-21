<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo de tabla sencilla</title>
    </head>

    <body>

        <h1>Estados de una variable</h1>

        <table border='1'>
            <tr>
                <th>Prueba</th>
                <th>Contenido de $var</th>
                <th>isset($var)</th>
                <th>empty($var)</th>
                <th>(bool)$var</th>
 <!--                 <th>is_null($var)</th>
                 <th>is_array($var)</th>
                 <th>is_int($var)</th>
                 <th>is_double($var)</th>
                 <th>is_float($var)</th>-->
            </tr>
            <?php
            /**
             * Incompleta. No funciona correctamente. Esta versión es para utilizar funciones de variable
             */
            $fun = ['esta_configurada', 'esta_vacia', 'conversion_a_bool'];
            //, 'is_null', 'is_array', 'is_int', 'is_string','is_float'];
            $valores = [
                ['$var= null', null],
                ['$var= 0', 0],
                ['$var= true', TRUE],
                ['$var= false', FALSE],
                ['$var= "0"', "0"],
                ['$var= ""', ""],
                ['$var= "foo"', "foo"],
                ['$var= array()', array()],
                ['$var=9.36', 9.36]

            ];

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            function esta_configurada($var)
            {
                return isset($var);
            }

            function esta_vacia($var)
            {
                return empty($var);
            }

            function conversion_a_bool($var)
            {
                return (bool) $var;
            }
//
//            function es_nulo($var)
//            {
//                return isNull($var);
//            }

            function crearFilaResultados($caso, $var)
            {
                global $fun;
                static $i = 1;

                $output = '<tr><td>' . $i++ . '</td><td>' . $caso;
                for ($c = 0; $c < count($fun); $c++) {
                    $output .= '</td><td>' . (($fun[$c]($var)) ? 'true' : 'false');
                }
                $output .= '</td></tr>';
                echo $output . PHP_EOL;
            }

            foreach ($valores as list($caso, $valor))
                crearFilaResultados($caso, $valor);
//            crearFilaResultados('$var="Hola Mundo"', "Hola mundo");
            ?>

        </table>
    </body>
</html>