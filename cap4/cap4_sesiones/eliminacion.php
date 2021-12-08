<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php

        session_start();

        function eliminarSesion()
        {
            if (isset($_COOKIE[session_name()]))
            {
                setcookie(session_name(), "", time() - 3600, "/");
                unset($_COOKIE[session_name()]);
            }
            //$_SESSION = array();
            session_unset();  // no destruye la superglobal $_SESSION
            session_destroy();
        }

        
        
        if (isset($_SESSION['contador']))
            $_SESSION['contador'] ++;
        else
            $_SESSION['contador'] = 1;
        echo "Usted ha entrado en esta página " . $_SESSION['contador'] . " veces";
        if ($_SESSION['contador'] >= 3)
        {
            eliminarSesion();
        }
        ?>
    </body>
</html>
