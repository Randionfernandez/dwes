<?php

/*
 * Un método definido en una clase, sobreescribe un método (igual nombre) definido 
 * en un trait, no importa que tengan una signatura o visibilidad diferente.
 */
error_reporting(E_ALL);
/*
  Ejemplos de uso de traits
 * 
 */

trait A {

    private $privada = "Var privada del trait A";

    public function mimetodo(string $s) {
        echo "Trait A";
    }

}

/**
 * Description of ProbandoTraits
 *
 * @author randion
 */
class ProbandoTraits {

    use A;

    function mimetodo(int $b) {
        echo "Método de la clase";
    }
}

$o = new ProbandoTraits();

echo $o->mimetodo(5);

