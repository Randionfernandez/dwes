<?php

namespace referencias;

/*
 * Demuestra que la igualdad no estricta entre objetos, '==', compara valores públicos, privados y protegidos
 */

class A {

    public $a = 1;
    protected $b = 2;
    private $c = 3;

    function set_b($b) {
        $this->b = $b;
    }

    function get_b() {
        return $this->b;
    }

    function set_c($b) {
        $this->c = $b;
    }

    function get_c() {
        return $this->c;
    }

    function __set($name, $valor) {
        $this->${$name} = $valor;
    }

}

$obj1 = new A;
$obj2 = new A;
$obj2->set_c(2);

if ($obj1 == $obj2) {
    echo "Igualdad no estricta<b/>";
} else {
    echo "los objetos no son iguales en valores<b/>";
}

if ($obj1 === $obj2) {
    echo "Igualdad estricta<b/>";
} else {
    echo "No son estrictamente iguales<b/>";
}


$obj2 = $obj1;

if ($obj1 === $obj2) {
    echo "Ahora son Igualdad estricta<b/>";
} else {
    echo "No son estrictamente iguales<b/>";
}

// Notación no válida
//echo "ADmintiendo notación válida  $obj1->$a";
