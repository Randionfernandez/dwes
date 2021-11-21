<!doctype html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class Persona {

            const apellido = 'randion';

            var $nom, $apellido;
            static $varestatica = "Esto es una variable estática de clase";
            private $obj_privado = 123;
            protected $obj_protegido = "Protegido";
            private $segundoprivado;
            protected $segundoprotegido;
            private $Persona = 4567;

            function __construct($n = 'Rafa', $apel = 'Apellidin') {
                $this->nom = $n;
                $this->apellido = $apel;
                echo self::$varestatica;
            }

            function mostrarNombre() {
                static $festatic = 23456;
                echo "El nombre es: $this->nom $this->apellido";
            }

            function __sleep() {
                echo "hola mundo cruel<br />";
                return array_keys(get_object_vars($this));
            }

            function __wakeup() {
                echo "Estamos deserializando";
            }

        }

        $object = new Persona;

        $resultado = get_object_vars($object);
        //unset($resultado['nom']);
        echo "resultado es: <br />";
        var_dump($resultado);

        echo "El apellido es: " . Persona::apellido;

//        $o = new Persona('Rafael', 'Apellidin');
//        $o_serializado = serialize($o);
//
//        echo $o_serializado . '<br />';
//        $o->mostrarNombre();
//        $objunseria= unserialize($o_serializado);
//        var_dump($objunseria);
        ?>
    </body>
</html>
