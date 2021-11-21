<?php

/*
 * Un modo definido en una clase, sobreescribe un método (igual nombre) definido 
 * en un trait, no importa que tengan una signatura diferente.
 */
error_reporting(E_ALL);
/*
  Ejemplos de uso de traits
 * 
 */

trait A {

    private $privada = "Var privada del trait A";

    public function mimetodo() {
        echo "Trait A";
    }

}

trait B {

    use A;

    private $privada = "Var privada del trait A";
    protected $protegida = "Variable protegida";

//    public function mimetodo() {
//        echo "Trait B";
//    }
}

interface interf2 {

    function metodo1(int $a);
}

interface interf3 {

    function metodo2(int $a);
}

interface interf1 extends interf2, interf3 {

    function metodo1(int $b);
}

/**
 * Description of ProbandoTraits
 *
 * @author randion
 */
class ProbandoTraits implements interf1 {

    use B;

    function metodo1($b) {
        
    }

    function metodo2($b) {
        
    }

//    public function mimetodo(int $A = 1, string $X = 'si') {
//        echo "metodo clase A: A vale $A y X vale $X";
//    }

}

$o = new ProbandoTraits();

echo $o->mimetodo(5);

