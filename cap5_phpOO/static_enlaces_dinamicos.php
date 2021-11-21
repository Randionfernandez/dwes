<?php

class A {

//    function foo();
//    {
////        echo "¡Éxito!\n";
//    }

    public function test() {
        $this->foo();
        static::foo();
    }

}

class B extends A {
    /* foo() se copiará en B, por lo tanto su ámbito seguirá siendo A
     * y la llamada tendrá éxito */
}

class C extends A {

    protected function foo() {
        /* se reemplaza el método original; el ámbito del nuevo es ahora C */

        echo "Ejecutando foo() de C y privada\n";
    }

}

//$b = new B();
//$b->test();
$c = new C();
$c->test();
?>
