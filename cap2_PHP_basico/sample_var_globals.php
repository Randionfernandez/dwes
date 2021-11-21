<?php

function variable_global($temp){
    global $probando;
    $probando= $temp;
}


variable_global("hola mundo cruel");


echo $probando;
var_dump($GLOBALS);