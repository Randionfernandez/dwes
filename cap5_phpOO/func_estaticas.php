<?php

/*
 * ¿Se puede llamar a un método static desde un método de instancia?
 * Y desde un método de instancia ¿se puede llamar a un método static?
 * 
 * Compruébalo añadiendo una llamada a un método de instancia desde un método static
 */

class prueba {

    function presentarNombre($param) {
        
    }

    static function verNombre($nombre) {
        echo "<br/>El nombre es: $nombre";
    }

    function __construct() {
        prueba::verNombre("toni");
    }

}

$obj = new prueba();

prueba::verNombre(" rafael");
