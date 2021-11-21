<?php

/*
 * Constantes declaradas dentro de una interfaz y forma de acceder a ellas. 
 * Serán heredadas por las clases que las implementen.
 * 
 * Actualmente una clase puede implementar dos interfaces que especifiquen un 
 * método con el mismo nombre, siempre que los métodos duplicados tengan la misma
 * signatura.
 */

interface Prueba1 {

    function sinuso();
}

interface Prueba2 {

    const PI = 3.14159;

    function sinuso();
}

interface Contable extends Prueba1, Prueba2 {

    const saludo = "Hola mundo<br/>";

    static function contador();
}

class Mueble implements Contable {

    public $cantidad;

    public function sinuso() {
        
    }

    static public function contador() {
        echo Mueble::saludo;
    }

}

$obj = new Mueble();

$obj->contador();   // Llamada no estática
Mueble::contador(); // Llamada estática
echo '<br/>El número PI es: ' . Mueble::PI;
