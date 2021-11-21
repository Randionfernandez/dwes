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
        var_dump($_GET);
        var_dump($_SERVER['QUERY_STRING']);
        echo '<br' . var_dump($_SERVER['REQUEST_URI']);
        ?>
    </body>
</html>
