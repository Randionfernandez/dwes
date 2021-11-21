<?php

/*
 * Da error por sobrescribir un método final
 */

class Persona {

    public final function noModificable() {
        // También se puede escribir "final public function noModificable"
        echo "Este método no es modificable por un descendiente";
    }

}

class Hijo extends Persona {

    public function noModificable() {
        echo "Modificando el método noModificable";
    }

}

$obj = new Persona();

