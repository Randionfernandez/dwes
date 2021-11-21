<?php
/*
 * Función que retorna una referencia
 */
class foo {

    public $valor = 42;

    public function &obtenerValor() {
        return $this->valor;
    }

}

$obj = new foo;
$miValor = &$obj->obtenerValor(); // $miValor es una referencia a $obj->valor, que es 42.
$obj->valor = 2;
echo $miValor;                // imprime el nuevo valor de $obj->valor, esto es, 2.
?>