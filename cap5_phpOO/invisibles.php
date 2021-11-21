<!doctype html>
<!--
Declarando funciones mágicas para atributos y métodos invisibles
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class ClasePrueba {

            private $atributoprivado = 3;  // var y public son equivalentes
            public static $atr_estatico = "Estático";

            function __construct() {
                $this->atributoprivado = 4;

                echo "Constructor. Objeto creado y el atr. privado vale $this->atributoprivado";
            }

            function __get($name) {
                echo "<br/>Accediendo a un atributo invisible: " . $this->$name;
            }

            function __set($name, $valor) {
                $this->$name = $valor;
                echo "<br>__set--Configurando un atributo invisible: $name = $valor";
            }

            function __call($f, $arg) {
                echo "<br/>Llamando al método invisible. $f";
            }
            
            static function __callStatic($f, $arg) {
                echo "<br/>El método estático<b> $f </b>no existe";
            }

            static function metodoStatic($numero) {
                return $numero * 2;
            }

        }

        $obj = new ClasePrueba(); //Muestra “El objeto se ha creado”;


        $obj->metodoInexistente();  // método invisible
        // probar comentando el atributo correspondiente
        echo "<br/>Atributo privado vale: " . $obj->atributoprivado;
        echo "<br/>Atributo estático: " . ClasePrueba::$atr_estatico;
        echo "<br/>Escribiendo atr. inexistente:" . $obj->noexisto = 777;
        echo "<br/>Método estático: " . ClasePrueba::metodoStatic(2);
        echo "<br/>Método estático inexistente: " . ClasePrueba::metStaticInexistente(2);
        var_dump($obj);
        ?>
    </body>
</html>
