<?php

/**
 * Los catch se ejecutan de arriba a abajo
 * Primero escribiremos las excepciones más específicas (hijas)
 * Por último añadiremos la excepción Exception u otra excepción raíz,
 * si queremos garantizar que sea capturada.
 * 
 * Árbol de excepciones reservadas
 * https://www.php.net/manual/es/reserved.exceptions.php
 * 
 * Exception
 *  --> ErrorException
 * Error    es la clase base para todos los errores de PHP internos.
 *  --> ArithmeticError
 *  ------> DivisionByZeroError   
 *  --> AssertionError    se lanza cuando falla una afirmación realizada mediante assert()
 *  --> CompileError
 *  ------> ParseError
 *  --> TypeError
 *  ------> ArgumentCountError   es lanzado cuando muy pocos argumentos son pasados a una funcion o método definido por el usuario. 
 * 
 * 
 * Árbol de excepciones de la SPL. todas extienden de Exception
 * https://www.php.net/manual/es/spl.exceptions.php
 */
class PruebaException extends Exception {
    
}

function divide($dividend, $divisor) {
    if ($divisor == 0) {
        throw new PruebaException("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    echo divide(5, 0);
} catch (PruebaException $e) {
    echo "Probando excepción. " . $e->getMessage();
} catch (Exception $e) {
    echo "Unable to divide.";
}
