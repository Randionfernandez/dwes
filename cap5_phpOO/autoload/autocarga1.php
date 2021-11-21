<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

//         Autoload con fichero de la clase siguiendo un convenio de 
//         denominación y guardado en el un único directorio accesible.
//         Fue pregunta de examen.

        function __autoload($nomclase) {
            $nomclase = str_replace("..", "", $nomclase);
            echo $nomclase . '<br />';
            require_once (__DIR__ . "/clases/$nomclase.php");
        }

        $o = new Persona;
        var_dump($o);
        ?>
    </body>
</html>


