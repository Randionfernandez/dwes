<?php
// Se puede borrar este archivo. Usado para comprobaciones


$variableglobal ="Variable global";
$yotramas="Hola mndo";
$global=3;

static $globalestatica="globalestatica";  // ¿Hay diferencias con global?

function unafuncion(){
    $variablelocal=5;
    global $otravariableglobal;
    static $variable_estatica=10;
    if (true){$j=10;}
    echo "la variable j vale:  $j";
    
    function mifuncion(){echo "funcion anidada";}
}

function globals(){return;}
echo $variableglobal. '<p>';
echo $globalestatica. '<p>';
echo $otravariableglobal. '<p>';

echo "Concatenando: ". ${'variable'.'global'} . '<p>';
unafuncion();
var_dump($GLOBALS);

