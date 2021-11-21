<?php

/*
 * Los traits que incorpora una clase están todos en el mismo nivel jeráquico
 * 
 * Si la clase A tiene el trait B y este tiene el trait C, es lo mismo que A 
 * tuviese los traits B,C. 
 * 
 */

trait X {

    private $x = "Cargando x";

}

trait C {

//    use X;

    private $x = "Cargando x";

}

trait B {

    use C,
        X;

    private $a = " variable a";
    protected $b;
    public $c;

    private function mprivate() {
        echo "Llamada privada $d";
    }

    protected function mprotected() {
        echo "Llamada publica" . $this->a;
    }

    public function mpublic() {
        $this->x = 5;
        echo "Llamada publica" . $this->x;
    }

}

class A {

    use B;
}

$obj = new A;

$obj->mpublic();
