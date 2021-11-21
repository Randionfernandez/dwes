<?php

error_reporting(E_ALL);
/*
  Ejemplos de uso de traits
 * 
 */

trait A {

    public $contador = 0;

    public function decirHola() {
        $this->contador = ++$this->contador;
        echo "Saludando Hola<br/>";
    }

}

trait B {

    private $privada = "Variable privada";
    protected $protegida = "Variable protegida";

    public function decirAdios() {
        echo "Despidiéndome: Adiós<br/>";
    }

}

/**
 * Description of ProbandoTraits
 *
 * @author randion
 */
class ProbandoTraits {

    use A,
        B;

    public function __construct() {
        $this->decirHola();
    }
    
    function privada() {
        echo "<br/>Acceso a la variable privada " . $this->privada;
    }
    
    function protegida() {
        echo "<br/>Acceso a la variable protegida " . $this->protegida;
    }

}

$o = new ProbandoTraits();

//$o->decirHola();
$o->decirAdios();
//echo "<br/>La variable es privada:  $o->privada()";
//echo "<br/>La variable es protegida: " . $o->protegida();
//echo "Contador vale: $o->contador";
