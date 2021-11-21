<?php

function factorial($n) {
    if ($n == 1)
        return 1;


    return $n * factorial($n - 1);
}

echo "El factorial de 3 es: " . factorial(1701);
