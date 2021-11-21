<?php

class OverloadedClass {

    public function __call($f, $p) {
        if (method_exists($this, $f . sizeof($p)))
            return call_user_func_array(array($this, $f . sizeof($p)), $p);
        // function does not exists~
        throw new Exception('Tried to call unknown method 
' . get_class($this) . '::' . $f);
    }

    function Param2($a, $b) {
        echo "Param2($a,$b)\n";
    }

    function Param3($a, $b, $c) {
        echo "Param3($a,$b,$c)\n";
    }

}

$o = new OverloadedClass();
$o->Param(4, 5);
$o->Param(4, 5, 6);
