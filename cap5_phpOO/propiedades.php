<?php

/*
 * ¿Qué pasa si un clase hija tiene una propiedad de igual nombre que otra heredada?
 * ¿Cómo influye que la propiedad del ancestro sea pública, privada o protegida?
 */

class Padre {

  public $publica = '<br/>padre-pública';
  protected $protegida = '<br/>padre-protegida';
  private $privada = 'padre-privada';
}

class Hijo extends Padre {

  public $publica = '<br/>hijo-pública'; // probar también sin inicializar

  public function __get($property) {
    if (property_exists($this, $property))
    echo $this->{$property};
  }

}

$obj = new Hijo;

echo $obj->publica;
echo $obj->protegida;
echo $obj->privada;  // No existe

/* ¿qué sucede si cambiamos de publica a privada la variable $publica de la clase
 * hijo?
 */