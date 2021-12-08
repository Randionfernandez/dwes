<?php

/*
 * Ejemplo de gestor de errores personalizado, en lenguaje PHP.
 * 
 * Fuente: Fundamentos PHP práctico. pág 706 (Ed. Anaya multimedia @2010).
 */

function calcWidgetsPerDay($total_widgets, $total_days)
{
    if ($total_days == 0)
    {
        trigger_error("calcWidgestPerDay(): El total de días no puede ser cero", E_USER_WARNING);
        return false;
    }
    else
    {
        return ($total_widgets / $total_days);
    }
}

function paranoidHanler($errno, $errstr, $errfile, $errline, $errcontext)
{
    $tipos = [
        E_WARNING => "Warning",
        E_NOTICE => "Notice",
        E_USER_ERROR => "Error",
        E_USER_WARNING => "Warning",
        E_USER_NOTICE => "Notice",
        E_STRICT => "Strict Warning",
        E_RECOVERABLE_ERROR => "Recoverable Error",
        E_DEPRECATED => "Deprecated Feature",
        E_USER_DEPRECATED => "Deprecated Feature"
    ];

    $message = date("Y-m-d H:i:s - ");
    $message .= "$tipos[$errno]" . ": $errstr en $errfile línea $errline\n";
    $message .= "Variables:\n";
    $message .= print_r($errcontext,true) ."\n";

    error_log($message,3, 'php_errores.log');
    die("Ha habido un problema y he detenido la ejecución. Inténtelo de nuevo");
}

set_error_handler('paranoidHanler');

echo calcWidgetsPerDay(10, 0);

echo "Esto nunca se imprimirá";
