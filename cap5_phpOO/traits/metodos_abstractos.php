<?php

/*
 * Un trait puede contener metodos abstractos, obligando a la clase que lo usa a
 * implementarlo.
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
echo $c->prueba();
