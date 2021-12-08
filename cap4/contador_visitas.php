<?php

/*
 */

if (isset($_COOKIE['visitas'])) {
    $_COOKIE['visitas']+=1;
    setcookie('visitas', $_COOKIE['visitas']);
    echo "Bienvenido, es la vez " . $_COOKIE['visitas'] . " que nos visitas";
} else {
    setcookie('visitas', 1);
    echo "Bienvenido es la primera vez que nos visitas";
}