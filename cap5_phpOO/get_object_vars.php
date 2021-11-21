<?php

class Potatoe {

    public $skin;
    protected $meat;
    private $roots;

    function __construct($s, $m, $r) {
        $this->skin = $s;
        $this->meat = $m;
        $this->roots = $r;
    }

}

$Obj = new Potatoe(1, 2, 3);

echo "<pre> \n";
echo "Using get_object_vars:\n";

$vars = get_object_vars($Obj);
print_r($vars);

echo "\n\nUsing array cast:\n";

$Arr = (array) $Obj;
print_r($Arr);
?>
