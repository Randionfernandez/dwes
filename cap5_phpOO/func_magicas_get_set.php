<!doctype html>
<!--
Pregunta de examen
?) En __get() y __set(). Si una subclase no tiene definidas estas funciones pero la clase padre sí, ¿se activan
las funciones del padre? ¿cómo afecta a la subclase que una propiedad sea privada o protegida en la clase padre?
Probar con las funciones definidas en la clase y en la subclase.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php
// La función __autoload() no está soportada a partir de PHP 8.0 ->'Fatal error'
        function __autoload($clase) {
            echo "<br/>Activando autoload";
        }

        class Padre {

            private $privada = 3;

            // No se puede declarar dinámicamente una variable static.
            // Las variables no static añadidas dinámicamente solo pertenecen al objeto.
            // ¿Se pueden crear dinámicamente variable protegidas o privadas? ¿Cómo?.

            function __get($var) {
                echo "<br/>__get: La variable no existe " . $this->$var;
                return $this->$var;
            }

            function __set($var, $value) {
                if (isset($this->{$var})) {
                    return $this->{$var};
                }
                echo "<p>__set: La variable no exite y no se puede asignar";
            }

        }

        class Hijo extends Padre {

            function __get($nom) {
                echo "Hola mundo";
            }

        }

        $obj = new Hijo();
        @$prueba = $obj->privada;
        @$obj->noexiste = 7;

        //echo "<br/>El valor de noexiste es: " . $obj->privada;
        //$obj2 = new NoClase;
        echo "<p>Fin</p>"
        ?>

    </body>
</html>
