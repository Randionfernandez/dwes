<?php

try {
    try {
        throw new Exception("An error occurred", 1);
    } catch (Exception $e1) {
        throw new Exception("Another error occurred", 2, $e1);
    }
} catch (Exception $e2) {
    echo $previous = $e2->getPrevious();
    echo $previous->getMessage();
}
?> 