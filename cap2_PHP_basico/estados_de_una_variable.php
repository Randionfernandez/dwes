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

            <body>

                <h1>Estados de una variable</h1>
            <th>empty($var)</th>
            <th>(bool)$var</th>
            <th>is_null($var)</th>
<!--                <th>is_array($var)</th>
            <th>is_int($var)</th>
            <th>is_double($var)</th>
            <th>is_float($var)</th>-->
        </tr>
        <?php
        /**
         * Funciona correctamente.
         * 
         * @todo crear una versión que use funciones de variable
         */
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        /**
         * 
         * @global  mixed  $var
         * @staticvar  int  $i
         * @param  string  $caso
         */
        function crearFilasResultados($caso) {
          global $var;
          static $i = 1;

          $output = '<tr><td>' . $i++ . '</td><td>' . $caso;

          $output .= '</td><td>' . (isset($var) ? 'true' : 'false');
          $output .= '</td><td>' . (empty($var) == 1 ? 'true' : 'false');
          $output .= '</td><td>' . ((bool) $var ? "true" : "false");
          $output .= '</td><td>' . (is_null($var) ? "true" : "false");

          $output .= '</td></tr>';
          return $output . PHP_EOL;
        }

        $filas = "";

        $var = null;
        $filas .= crearFilasResultados('$var=null');

        $var = 0;
        $filas .= crearFilasResultados('$var= 0');

        $var = true;
        $filas .= crearFilasResultados('$var= true');

        $var = false;
        $filas .= crearFilasResultados('$var= false');

        $var = "0";
        $filas .= crearFilasResultados('$var= "0"');

        $var = "";
        $filas .= crearFilasResultados('$var= ""');

        $var = "foo";
        $filas .= crearFilasResultados('$var= "foo"');

        $var = array();
        $filas .= crearFilasResultados('$var= array()');

        unset($var);
        $filas .= crearFilasResultados('unset($var)');

        $var = "1 gato";
        $filas .= crearFilasResultados('$var= "1 gato"');

        $var = "0 gatos";
        $filas .= crearFilasResultados('$var= "0 gatos"');

        $var = 9.36;
        $filas .= crearFilasResultados('$var=9.36');

        $var = "Hola Mundo";
        $filas .= crearFilasResultados('$var="Hola Mundo"');

        echo $filas;
        ?>

    </table>
</body>
</html>