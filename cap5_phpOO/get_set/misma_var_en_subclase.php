<?php

/*
 * Mismo nombre de propiedad en la clase madre e hija.
 * Atención a los casos:
 * __set existe en ambas clases.
 * __set existe únicamente en la clase madre.
 * __set existe únicamente en la clase hija.
 * 
 * Combinaciones de visibilidad:
 * 
 * Clase Madre          | Clase Hijo         | Resultado
 *                      |                    |
 * private $nombre      | private $nombre    | Hijo tiene 2 propiedades $nombre
 * private $nombre      | protected $nombre  | Hijo tiene 2 propiedades $nombre
 * private $nombre      | public $nombre     | Hijo tiene 2 propiedades $nombre
 * protected $nombre    | private $nombre    | Error
 * protected $nombre    | protected $nombre  | Hijo solo tiene un $nombre
 * protected $nombre    | public $nombre     | Hijo solo tiene un $nombre
 * public $nombre       | public $nombre     | Hijo solo tiene un $nombre
 * public $nombre       | private $nombre    | Error
 * public $nombre       | protected $nombre  | Error
 */

class Madre {

    private $nombre = "Pedro";
    private $noexisto = 34;

//    public function __set($var, $value) {
//        $this->$var = $value;
//    }

}

class Hijo extends Madre {

    private $nombre=222;

    public function __set($var, $value) {
//        if (property_exists($this, $var))
            $this->$var = $value;
    }

}

$hijo = new Hijo();
$hijo->noexisto = "Kevin";
$hijo->nombre = "Jaime";
var_dump($hijo);
?>