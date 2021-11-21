<?php

if (isset($_POST))
{
    //var_dump($HTTP_POST_VARS);
    
    // lee la entrada en crudo del body de una petición
    $entrada_post = file_get_contents("php://input");
    
    echo $entrada_post;
}
?>