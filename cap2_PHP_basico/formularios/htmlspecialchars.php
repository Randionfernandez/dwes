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
        if (isset($_POST['nombre'])) {
            $output = "El nombre es: " . $_POST['nombre'];
            $output = htmlspecialchars($output);
            echo $output;
        }
        ?>
        <form method='post'>
            <input type="text" name='nombre' value="" autofocus/>
            <input type="submit"/>
        </form>
    </body>
</html>