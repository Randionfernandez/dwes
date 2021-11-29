<?php

error_reporting(E_ALL);
/*
  No se permite la sobreescritura de una variable definida en un trait,
 * salvo que las dos variables ( la de la clase y la del trait) sean 
 * exactamente iguales (tipo y valor).
 * 
 */

trait A {
    public $contador = 2;
}

/**
 * Description of ProbandoTraits
 *
 * @author randion
 */
class ProbandoTraits {

    use A;

    public $contador = "2";

}

$o = new ProbandoTraits();

echo "El ámbito es: " . $o->contador;  // Fatal error
?>
