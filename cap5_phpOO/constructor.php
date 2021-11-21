<?php

class Abuelo {

    function Abuelo() {
        echo "hola mundo";
    }

    function __construct() {
        echo "<br/>Instanciando abuelo";
    }

}

class Padre extends Abuelo {

    function __construct() {
        echo "<br/>Instanciando padre";
    }

    function Padre() {
        echo "<br/>Iniciando padre";
    }

}

class Hijo extends Padre {

    function __construct() {
        parent::__construct();
    }

}

class MiClase {

    public $color;

    function __construct($c = 'verde') {
        $this->color = $c;
        echo "<br/>El objeto Miclase se ha creado e iniciado con color $this->color";
    }

}

$padre = new Padre();
$hijo = new Hijo();
$o = new MiClase();
echo "<br/>El color es " . $o->color;
$hijo->padre=$padre;
$hijo->padre->Padre();
var_dump($hijo);
?>