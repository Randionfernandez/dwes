<?php

/* 
 * Muestra las constantes __DIR__ y __LINE__ indicando qúe número de linea se asigna en el caso de un fichro
 * incluya  a otro
 */



include 'prueba/embebido.php';

echo "Mensaje no embebido: __DIR__ es: ".  __DIR__ . ' - '. __LINE__;

