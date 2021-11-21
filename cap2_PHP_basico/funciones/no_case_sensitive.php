<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function noCaseSensitive()
        {
            static $i = 1;

            echo '<br>' . date(DATE_RFC2822) . "esta es la llamada $i";
            $i++;
        }
        
        nocasesensitive();
        noCaseSENSITIVE();
        ?>
    </body>
</html>
