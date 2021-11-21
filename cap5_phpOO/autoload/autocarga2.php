<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Autoload con fichero de clases sin seguir ningún convenio de denominación
         * y guardando las clases en cualquier directorio accesible.
         * 
         * Fue pregunta de examen.
         */
        $clases = [
            'Persona' => 'clases/Persona.php',
            'Persona2' => 'clases2/Persona2.php'
        ];

        function __autoload($nomclase) {
            global $clases;

            include $clases["$nomclase"];
        }

        $obj1 = new Persona;
        $obj2 = new Persona2;
        ?>
    </body>

</html>