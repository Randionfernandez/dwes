<!doctype html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function foo() {
            $númargs = func_num_args();

            echo "Número de argumentos: $númargs<br />\n";
            if ($númargs >= 2) {
                echo "El segundo argumento es: " . func_get_arg(1) . "<br />\n";
            }
            $arg_list = func_get_args();
            for ($i = 0; $i < $númargs; $i++) {
                echo "El argumento $i es: " . $arg_list[$i] . "<br />\n";
            }
        }

        foo(1, 2, 3);
        foo(4,5,6,7,8,9,0);
        ?>

    </body>
</html>
