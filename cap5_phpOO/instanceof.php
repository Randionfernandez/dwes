<?php

/* 
 * demostación de instanceof y get_class()
 */

class Abuelo{}
class Padre extends Abuelo{}
class HijoA extends Padre{}
class HijoB extends Padre{}

$hb= new HijoB;

echo "<br />Es hijo B instancia de Padre? " . ($hb instanceof Padre ? 'cierto': 'falso');
echo "<br />Es hijo B instancia de Abuelo? " . ($hb instanceof Abuelo ? 'cierto': 'falso');
echo "<br />Es hijo B instancia de HijoA? " . ($hb instanceof HijoA ? 'cierto': 'falso');
echo "<br />Es hijo B instancia de HijoB? " . ($hb instanceof HijoB ? 'cierto': 'falso');
echo "<br />Hijo B pertenece a la clase " . get_class($hb);



abstract class bar {
    public function __construct()
    {
        var_dump(get_class($this));
        var_dump(get_class());
    }
}

class foo extends bar {
}

new foo;


