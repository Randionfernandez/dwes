<?php

// PHP code to get the Fibonacci series 
function Fibonacci($n) {

    $num1 = 0;
    $num2 = 1;

    $counter = 0;
    while ($counter++ < $n) {
        echo ' ' . $num1;
        $num3 = $num2 + $num1;
        $num1 = $num2;
        $num2 = $num3;
    }
}

$n = 10;
Fibonacci($n);
?> 