<?php

/* Versión recursiva de la función de fibonacci */

function fibonacci(int $n) {
    if ($n === 1 || $n === 0)
        return $n;

    return (fibonacci($n - 1) + fibonacci($n - 2));
}

echo fibonacci("3");
