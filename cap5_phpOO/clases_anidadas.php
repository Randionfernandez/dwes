<?php

namespace Orientacion_a_Objetos;
/**
 * Las clases anidadas No están implementadas en PHP.
 * 
 * Existe un borrador que propone incluirlas
 * Actualmente siguen sin implementarse (Sep 2021)
 */

/**
 * foo
 * @package foo
 */
class foo
{
/*
 * foo\bar supporting class for foo
 * @subpackage foo\bar
 * @private
 */

class bar
{

/*
 * \foo\bar\baz supporting class for foo\bar
 * @subpackage foo\bar\baz
 * @protected
 */
protected class baz
{

public function __construct() {

}
}

public function __construct() {
$this->baz = new foo\bar\baz();
}
}

/* PUBLIC API METHODS HERE */

public function __construct()
{
$this->bar = new \foo\bar();
$this->baz = new \foo\bar\baz();
}
}

var_dump(new \foo());
