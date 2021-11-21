<?php
/*
 * Visualiza todas las funciones 'internal' disponible
 * Calcula el número de funciones creadas por usuario 'user'.
 */

//function existe(){};
$funcs = get_defined_functions();
echo '<pre>';
var_dump($funcs);
echo '</pre>';
echo count($funcs ['user']);
?>