<?php

/*
 * Declaración de constantes. A partir de la versión 5.3+ podemos usar la
 * palabra clave 'const'
 */

define('PI', 3.14159);
echo 'Usando define: ' . PI;

const SALUDO = "Hola mundo";
echo '<br/>Usando const: ' . SALUDO;

// No se puede redefinir una constante.
// La declaración siguient producirá un Notice, y se mantendrá el valor anterior.
define('PI', 3.22222);
echo 'Usando define: ' . PI;

