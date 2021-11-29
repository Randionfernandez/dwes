<?php

/*
 * Dos traits con el mismo mmétodo provocará un conflicto (fatal error), salvo
 * que explicitemos cuál de ellos queremos usar (insteadof).
 * 
 * Podemos utilizar alias
 */

trait Base1 {

    public function hola($nombre) {
        return "Hola1: {$nombre}";
    }

    public function adios($nombre) {
        return "Adios1: {$nombre}";
    }

}

trait Base2 {

    public function hola($nombre) {
        return "Hola2: {$nombre}";
    }

    public function adios($nombre) {
        return "Adios2: {$nombre}";
    }

}

class Ejemplo2 {

    use Base1,
        Base2 {
        Base1::hola insteadof Base2;
        Base1::adios insteadof Base2;
        Base2::adios as despidiendome2;
        Base2::hola as saludando2;
    }
}

$e = new Ejemplo2();
echo $e->hola('Ivan') . "<br/>";
echo $e->despidiendome2('Jacinto');
