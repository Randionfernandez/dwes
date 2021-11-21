<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//Ejemplo de función anónima para definir la autocarga        
        
        spl_autoload_register(function ($nomclase) {
            require __DIR__ . "/clases/$nomclase.php";
        });

        $o = new Persona;
        ?>
    </body>
</html>
