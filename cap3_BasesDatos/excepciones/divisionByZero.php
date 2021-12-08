<?php

ini_set('log_errors', 3);
$dividendo = 100;
$divisor = 0;

set_error_handler('_error_handler');

function _error_handler($errno, $errstr, $errfile, $errline)
{ 

    echo 'Log_errors: ' . ini_get('log_errors') . ' error_log: ' . ini_get('error_log') . '<br />';
    error_log("\nSe ha producido el error $errno $errstr\n $errfile línea $errline\n");
    //die;
}

try
{

//    if ($divisor == 0)
//
//        throw new TypeError("División por cero.");

    $resultado = $dividendo / $divisor;
}
catch (Error $e)
{

    echo "Excepción: se ha producido el siguiente ERROR: " . $e->getMessage();
    return true;
}
catch (Exception $e)
{

    echo "Se ha producido La siguiente excepción: " . $e->getMessage();
    return true;
}

carajete();
