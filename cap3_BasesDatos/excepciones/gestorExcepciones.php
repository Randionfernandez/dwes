<?php   

$dividendo = 100;
$divisor = 0;

function miGestorDeErrores($nivel, $mensaje, $errfile, $errline, $err_context)
{

    switch ($nivel)
    {
        // Nunca se procesa E_ERROR, pues lo trata exclusivamente el gestor de PHP
        case E_ERROR: {
                echo "Error de tipo ERROR: $mensaje en el fichero $errfile y línea $errline.<br/>";
                break;
            }
        case E_WARNING: {
                // return true;
            
                echo "Error de tipo WARNING: $mensaje en el fichero $errfile y línea $errline.<br />";
        //        return FALSE;
                break;
            }
        case E_NOTICE: {
                echo "Error de tipo NOTICE: $mensaje en el fichero $errfile y línea $errline.<br />";
                break;
            }
        default:

            echo "Error de tipo no especificado: $mensaje en el fichero $errfile y línea $errline.<br />";
    }
}

///////////////////////////////////////////////////////
error_reporting(E_ERROR);

set_error_handler("miGestorDeErrores");


//trigger_error("Esto es un lío");
$var = 1;

$resultado = $dividendo / $divisor;
try
{

    //$var->metodo();
}
catch (Exception $e)
{
    echo "La excepción alcanzada es: ('ESTE ES EL mensaje')";
}

restore_error_handler();



echo "<br/>Ahora se restauró el gestor de errores anterior<br/>";
$resultado = $dividendo / $divisor;


