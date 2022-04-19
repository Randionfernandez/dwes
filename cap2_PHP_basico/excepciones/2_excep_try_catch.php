<?php

class PruebaException extends Exception {
    
}

function divide($dividend, $divisor) {
    if ($divisor == 0) {
        throw new PruebaException("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    echo divide(5, 0);
} catch (Exception $e) {
    echo "Unable to divide.";
} catch (Error $e) {
    echo "Unable to divide.";
}
?> 