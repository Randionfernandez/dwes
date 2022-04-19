<!DOCTYPE html>
<html>
    <body>

        <?php

// A user-defined exception handler function
        function myException($exception) {
            echo "<b>Exception:</b> ", $exception->getMessage();
        }

// Set user-defined exception handler function
        set_exception_handler("myException");

// Throw exception
        throw new Exception("Uncaught exception occurred!");
        echo "hola exception";
        ?>

    </body>
</html>
