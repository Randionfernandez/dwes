<?php
/* Muestra 
 * - Cómo acceder auna variable estática desde una global
 * - Cómo asigna un valor a una variable cuando no se llama con el &
 */
function &func() {
    static $static = 0;
    $static++;
    return $static;
}

$var1 = & func();
echo "var1_a: ", $var1; // 1
func();
func();
echo "<br/>var1_b: ", $var1; // 3
$var2 = func(); // assignment without the &
echo "<br/>var2_a: ", $var2; // 4
func();
func();
echo "<br/>var1_c: ", $var1; // 6
echo "<br/>var2_b: ", $var2; // still 4
?>