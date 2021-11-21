<?php

/*
 * if   NO   tiene su propio ámbito 
 */

$bool = true;  // probar con $bool a true y a false
if ($bool) {
    $hi = '<p>Hello to all people!';
}
?>


<?php

/*
 * Aquí emitirá un Notice, la asignación no se produce y por tanto $hi no existe.
 */
if (false) {
    $hi = '<p>Hello to all people!';
}
echo $hi;
?>

