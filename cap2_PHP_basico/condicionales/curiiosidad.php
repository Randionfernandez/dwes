<?php

function message($m)
{
    echo "$m <br />\r";
    return true;
}

$k = false;
if (message("first class") && $k && message("second class"))
{
;
}
// will show 
//first class;
$k = true;
if (message("first") && $k && message("second"))
{
;
}
// will show 
//first 
//second  
?>