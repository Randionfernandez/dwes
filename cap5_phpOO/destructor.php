<!doctype html>
<!--
Ejemplo de destructor en PHP OO.
Se activa con:
    unset
    die
    Al finalizar el script. Para comprobarlo, comenta la sentencia die() y la
función guardar se ejecutará una segunda vez, por haber finalizado el script.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OO_destruct</title>
    </head>
    <body>
        <?php

        class Persona {

            public function guardar() {
                echo "<br/>Guardando el objeto en la base de datos";
            }

            public function __destruct() {
                $this->guardar();
            }

        }

        // end class Persona

        class Hija extends Persona {
            
        }

        $p1 = new Hija;
        unset($p1);

        $p2 = new Hija;
        die('<br/>¡Algo ha ido mal!');

//Llama a  __destruct por finalización del script
        echo "<br/>Esto solo se ejecuta si comentas die.";
        ?>
    </body>
</html>
