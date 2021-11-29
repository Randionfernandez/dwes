<?php

error_reporting(E_ALL);
/*
 * Ejemplos de uso de traits
 * 
 * Traits no pueden tener constantes.
 * 
 * La clausula 'use' equivale a un 'include' en cuanto al ámbito de los
 * métodos y variables protected y private.
 * 
 * Una clase que incluya un trait tiene el mismo efecto que si se copiase el 
 * trait dentro de la clase (metodos y variables).
 */

trait A {

//    public const PI = 3.1416;   //  Fatal error
//    define(PI, 3.1416);   //  Fatal error
    private $a = "Luís";

    private function decirHola($name) {
        echo "Saludando a $name<br/>";
    }

}

trait B {

    use A;

    function __construct() {
        $this->decirHola('Luis');
    }

    public function decirAdios() {
        $this->decirHola('Carlos');
        echo "Despidiéndome: Adiós<br/>";
    }

}

/**
 * Description of ProbandoTraits
 *
 * @author randion
 */
class ProbandoTraits {
    const NAME = 'Lourdes';
    
    use B;

//    public function __construct() {
//        $this->decirHola($this->a);
//    }

}

$o = new ProbandoTraits();

//$o->decirHola();   // Error fatal
$o->decirAdios();
