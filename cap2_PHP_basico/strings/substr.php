<?php


$string = "<br/>Hola, Mundo";
echo substr($string, 0, 5) . '<br/>';          // Muestra 'Hola,”
echo substr($string, 6) . '<br/>';  // Muestra “Mundo”
echo substr($string, -1) . '<br/>';             // Muestra 'o'
echo substr($string, -5, -1);        // Muestra 'Mund' 
?>