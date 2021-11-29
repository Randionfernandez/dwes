<?php

/*
 * Un Trait puede incluir métodos estáticos, pudiendo usarlos sin instanciar la 
 * clase que lo contiene.
 */
trait Trait1 {

    function hola($nombre) {
        return "Hola: " . $nombre;
    }

    public abstract function prueba();
}

trait Trait2 {

    function adios($nombre) {
        return "Adios: " . $nombre;
    }

    public static function suma($num1, $num2) {
        return $num1 + $num2;
    }

}

trait Trait3 {

    use Trait1,
        Trait2;
}

class ClaseEjemplo {

    use Trait3;

    public function prueba() {
        return "Esto es una prueba";
    }

}

$c = new ClaseEjemplo();
echo $c->prueba() . "<br/>";
echo ClaseEjemplo::suma(4, 5);
