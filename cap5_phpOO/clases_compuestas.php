<?php

/**
 * Description of clases_compuestas
 * 
 * Verificación  pendiente.
 * 
 * @author randion
 */
class clases_compuestas {

    public $anidada;

    function __construct(int $val) {
        $this->anidada = $val;
    }

}

class clasesB {

    public $a;

    function _construct(int $param) {
        $this->a =7;// new clases_compuestas($param);
//        if (!is_null($this->a)) echo "La variable a es nula.";
    }

}

$prueba = new clasesB(7);
echo "la var vale: $prueba->a";
//var_dump($prueba);
//echo "El valor es: " . $prueba->a->anidada;

