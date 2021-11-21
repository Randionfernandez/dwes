<?php
namespace Foobar;

class Foo {
    var $mivar;
    static public function test($nombre) {
        print '[['. $nombre .']]';
    }
}

spl_autoload_register(__NAMESPACE__ .'\Foo::test'); // A partir de PHP 5.3.0

//new ClaseInexistente;
var_dump(new Foo);
?>
