

<?php

/*
  Justificación: Como vemos, la propiedad una vez instanciado el objeto, le agregramos la propiedad textura y la leemos
  para comprobar que si haya creado. Después utilizando la función get_class_vars() y property_exists compruebo si la
  propiedad fue añadida a la clase, al objeto con isset(). Donde la propiedad pertenece al objeto donde fue creada, en
  este ejemplo al objeto $pepino

 */

class Verdura {

    public $comestible;
    public $color;

    function __construct($comestible, $color = "verde") {
        $this->comestible = $comestible;
        $this->color = $color;
    }

    function es_comestible() {
        return $this->comestible;
    }

    function que_color() {
        return $this->color;
    }

}

$pepino = new Verdura(true, "verde");

// Escribimos una propiedad que no existe en la clase
$pepino->textura = "grumosa";

// Leemos una propiedad que no existe en la clase
// echo $pepino->tamanyo;
echo $pepino->textura;

// Resultado: "grumosa"
// Ahora con property_exists() compruebo si la propiedad fue añadida a la clase

echo "<br>";

if (property_exists('Verdura', 'textura')) {
    echo "La propiedad existe en la clase Verdura";
} else {
    echo "La propiedad no existe en la clase Verdura";
}

echo "<br>";

// Resultado: "La propiedad no existe en la clase"
// otra forma de verlo es con get_class_vars

$props_clase_verdura = get_class_vars(get_class($pepino));

if (array_key_exists('textura', $props_clase_verdura)) {
    echo "true";
} else {
    echo "false";
}

echo "<br>";

// Ahora comprobar si está en el objeto
if (isset($pepino->textura)) {
    echo "La propiedad textura existe en el objeto Pepino";
} else {
    echo "La propiedad textura NO existe en el objeto Pepino";
}

echo "<br>";

// Ahora si creo otro objeto tipo Verdura, compruebo si este también tiene la propiedad "textura"
$tomate = new Verdura(true, "rojo");

if (isset($tomate->textura)) {
    echo "La propiedad textura existe en el objeto Tomate";
} else {
    echo "La propiedad textura NO existe en el objeto Tomate";
}
?>  