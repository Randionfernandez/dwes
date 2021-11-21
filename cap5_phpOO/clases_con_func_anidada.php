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

        class foo {

            public function init()
            {
                if (!function_exists('a'))
                {

                    function a()
                    {  // <- will only be declared when it doesn't already exist
                        echo "Función seudoanidada. ";
                    }

                }
            }

        }

        $o = new foo;
        $o->init();
        a();
        ?>
    </body>
</html>
