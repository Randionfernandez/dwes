<!doctype html>
<!--
Pregunta de examen
caso 1) En __get() y __set(). Si una subclase no tiene definidas estas funciones pero la clase padre sí, 
    ¿se activan las funciones del padre?
    ¿cómo afecta a una instancia de la subclase que una propiedad sea privada o protegida en la clase padre?
caso 2) Probar con estas funciones mágicas definidas en la clase y en la subclase.

No se puede acceder a una propiedad invisible de Hijo si no se definen en esta 
subclase los métodos _get(). Es decir, Padre::__set() no accede a propiedades de
Hijo

Si la función Padre::_get()  impide añadir propiedades dinámicamente, tampoco se
podrían añadir propiedades no existentes en Hijo.

Observación: El resultado depende de si la variable tiene asignado un valor o no,
es decir, esta a null.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php

        class Padre {

            private $padre_private = 4;
            protected $padre_protected;

            // No se puede declarar dinámicamente una variable static.
            // Las variables no static añadidas dinámicamente solo pertenecen al objeto.
            // ¿Se pueden crear dinámicamente variables protegidas o privadas? ¿Cómo?.

            function __get($nom) {
                if (property_exists($this, $nom))
                    return $this->$nom;
                echo "<br/>Padre::__get: La variable '$nom' es invisible en este contexto.";
            }

            function __set($nom, $value) {
                if (property_exists($this, $nom)) { // no usar isset(), ni empty()
                    return $this->$nom = $value;
                }
//              $this->$nom= $value;  // Esto permitiría agregar variables dinámicamente
                echo "<br/>Padre::__set: La variable '$nom' es invisible en este contexto y no se puede asignar";
            }

        }

        class Hijo extends Padre {

            private $hijo_private = 4;
            protected $hijo_protected;

//  Comentar estas funciones __get() y __set() para el caso 1
//            function __get($nom) {
//                if (property_exists($this, $nom))
//                    return $this->$nom;   // Da acceso a protegidas pero no a privadas de la clase Padre
//                echo "<br/>Hijo::__get, La variable '$nom' es invisible en este contexto";
//            }
//
//            function __set($nom, $value) {
//                if (property_exists($this, $nom)) { // no usar isset(), ni empty()
//                    return $this->$nom = $value;
//                }
////              $this->$nom= $value;  // Esto permitiría agregar variables dinámicamente
//                echo "<br/>Hijo::__set: La variable '$nom' es invisible en este contexto y no se puede asignar";
//            }

        }

        $obj = new Hijo();
        $padre_private = $obj->padre_private;
//        $padre_protected = $obj->padre_protected;
//        $hijo_private = $obj->hijo_private;
//        $hijo_protected = $obj->hijo_protected;
//        $no_existo = $obj->no_existo;
//        $obj->hijo_private = 25;
//        $obj->hijo_protected = 7;
//        $obj->no_existo = 32;

//        var_dump($padre_private);
//        var_dump($padre_protected);
//        var_dump($hijo_private);
//        var_dump($hijo_protected);
//        var_dump($no_existo);
        var_dump($obj);
        echo "<p>Fin</p>"
        ?>

    </body>
</html>
