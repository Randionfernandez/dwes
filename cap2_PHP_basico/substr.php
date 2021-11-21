<?php
/*
 * Ejemplo de obtención de subcadenas
 */
$string = "Hola, Mundo";
echo substr($string, 0, 5);          // Muestra 'Hola,”
echo '<br>' . substr($string, 6);  // Muestra “Mundo”
echo '<br>' . substr($string, -1);             // Muestra 'o'
echo '<br>' . substr($string, -5, -1);   //Muestra Mund
?>