<?php

/*
 * Varias evaluaciones encadenadas por OR
 * 
 * Ejemplo que demuestra que en cuanto una de las condiciones se cumple, no se 
 * comprueban las demás.
 * 
 * Las evaluaciones se ejecutan de izquierda a derecha.
 * 
 * Si condición1 retorna true, no se evaluan las demás, ya que el condicional
 * evaluaría a true.
 * 
 * Esta forma de proceder mejora la eficiencia en la ejecución.
 */

if (condicion1() ||
        condicion2() ||
        condicion3()) {
    echo "Entrando en el condicional<br/>";
}

function condicion1() {
    echo "Ejecutando condición1<br/>";
    return false;
}

function condicion2() {
    echo "Ejecutando condición2<br/>";
    return true;
}

function condicion3() {
    echo "Ejecutando condición3<br/>";
    return true;
}
