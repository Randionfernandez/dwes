<?php

namespace referencias;

/*
 * Cual es la diferencia entre un identificador y una referencia?
 * ¿Nombre y su valor(referencia)?
 */

//$a = 3;
//
//function bar(&$b) {
//    $b = 8;
//}
//
//$aref = & $a;   // recibe la referencia de $a
//$aref++;         // $a vale  4
//bar($aref);
//echo 'El valor de $a es: ' . $a;  //muestra 'El valor de $a es: 8'

class A {

    public $foo = 1;

}

$a = new A;
$b = $a;     // $a y $b son copias del mismo identificador
// ($a) = ($b) = <id>
$b->foo = 2;
$a->foo = 3;
echo 'Ejemplo1: ' . $a->foo . "\n";

$c = new A;
$d = &$c;    // $c y $d son referencias
// ($c,$d) = <id>

$d->foo = 2;
echo 'Ejemplo2: ' . $c->foo . "\n";

$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo 'Ejemplo3: ' . $e->foo . "\n";
