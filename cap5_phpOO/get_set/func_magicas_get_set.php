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

        class Padre {

            protected $privada = 3;

            // No se puede declarar dinámicamente una variable static.
            // Las variables no static añadidas dinámicamente solo pertenecen al objeto.
            // ¿Se pueden crear dinámicamente variables protegidas o privadas? ¿Cómo?.

            function __get($var) {
                echo "<br/>Padre::__get: La variable {$var} es invisible en este contexto.";
                return $this->$var;
            }

            function __set($nom, $value) {
                if (isset($this->$nom)) {
                    return $this->$nom;
                }
//                $this->$nom= $value;  // Esto permitiría agregar variables dinámicamente
                echo "<p>Padre::__set: La variable '$nom' no existe y no se puede asignar";
            }

        }

        class Hijo extends Padre {

            function __get($nom) {
                if (isset($this->$nom))
                    return $this->$nom;
                echo "Hijo::_get, La variable '$nom' es invisible en este contexto";
            }

        }

        $obj = new Hijo();
        $prueba = $obj->privada;
        $obj->noexiste = 7;

        var_dump($prueba);
        var_dump($obj);
        echo "<p>Fin</p>"
        ?>

    </body>
</html>
