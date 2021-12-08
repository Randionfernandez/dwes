<?php
/**
 * Convierte errores a excepciones. Aplicar a partir de php7.0
 * 
 * @param type $severity
 * @param type $message
 * @param type $file
 * @param type $line
 * @return type
 * @throws ErrorException
 */
function exception_error_handler($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        // This error code is not included in error_reporting
        return;
    }
    throw new ErrorException($message, 0, $severity, $file, $line);
    echo "Activada excepción<br/>";
}
set_error_handler("exception_error_handler");

echo "Error reporting es: " . error_reporting() .'<br/>';

/* Trigger exception */
strpos();
?>

