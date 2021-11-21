<?php

/*
 * unset()  de una global dentro de una función
 * 
 * Si desea aplicar unset() a una variable global dentro de una función, puede usar la matriz $GLOBALS para hacerlo:
 */

function destruir_foo() {
    global $foo;
    
    $foo="Destruyendo una global dentro de una función";
    //unset($foo);  // probar también este caso
    unset($GLOBALS['foo']);
    echo $foo;
}

$foo = 'bar';
destruir_foo();
echo $foo;
?>
