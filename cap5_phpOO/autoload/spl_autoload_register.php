<?php

function __autoload($class) {
    
}

function my_loader($nomclase) {
    if (file_exists("clases/$nomclase.php"))
        include "clases/$nomclase.php";
}

function your_loader($nomclase) {
    include "clases2/$nomclase.php";
}


var_dump(spl_autoload_functions());
echo '<br/>';

spl_autoload_register('my_loader');

spl_autoload_register('your_loader');

var_dump(spl_autoload_functions());

$obj = new Persona2();

var_dump($obj);
var_dump(spl_classes());

