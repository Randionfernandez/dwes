<?php

/*
  Si instanciamos una clase abstracta, nos dara un 'Fatal error'
 */

abstract class ClaseAbstracta {

    abstract function unmetodo();
}

abstract class ClaseAbstractaHija extends ClaseAbstracta {
    
}

class Nieta extends ClaseAbstractaHija {

    function unmetodo() {
        echo "Hola Mundo";
    }

}

$o = new Nieta;
echo $o->unmetodo();

//nos darís un error
//$abst= new ClaseAbstractaHija;
