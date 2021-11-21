<?php

/*
 * Ejemplo de qué sucede al utilizar el mismo nombre en un parámetro y en una global
 * La ubicación de la declaración global es determinante.
 * El vínculo de la variable global se produce a partir del momento de la declaración; hasta ese momento
 * se usa el valor del parámetro.
 */


$nombre = "Juan Goitisolo";

function global_local($nombre)
{
    echo 'Parámetro_nombre: ' . $nombre;
    global $nombre;     // a partir de aquí la variable es global.
    echo '<br/>Nombre_es_global: ' . $nombre;
    $nombre = "<br/>Gumersiondo<br/>";
    echo "<br/>$nombre";
}

global_local('Perico');

echo $nombre;
