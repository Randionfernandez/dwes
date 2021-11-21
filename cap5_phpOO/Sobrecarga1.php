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

        /**
         * Sobrecarga de métodos en PHP
         * 
         * @version php 5.6
         */
        class OverloadedClass {

            private function Param1($a) {
                echo "hola mundo, 1 parámetro";
            }

            private function Param2($a, $b) {
                echo "Param2($a,$b)\n";
            }

            private function Param3($a, $b, $c) {
                echo "Param3($a,$b,$c)\n";
            }

            public function Param() {
                $p = func_get_args();
                //var_dump($p); 
                try {
                    switch (sizeof($p)) {
                        case 1: {
                                $this->Param1($p[0]);
                                break;
                            }
                        case 2 : {
                                $this->Param2($p[0], $p[1]);
                                break;
                            }
                        case 3 : {
                                $this->Param3($p[0], $p[1], $p[2]);
                                break;
                            }
                        default : throw new Exception('Llamada a método ' . get_class($this) .
                                            '::Param, con número inadecuado de parámetros');
                    }
                } catch (Exception $e) {
                    echo "Entrando en la excepción:" . $e->getMessage();
                }
            }

        }

        $o = new OverloadedClass();
        $o->Param(4, 5);
        $o->Param(4, 5, 6, 6);
        $o->Param(3);
        ?>
    </body>
</html>
