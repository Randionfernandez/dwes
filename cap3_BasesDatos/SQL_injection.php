<!DOCTYPE html>
<!--
Pendiente de programar
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        try {
            $db = new \PDO('pgsql:host=localhost;dbname=daw2a_comunidades', 'daw2a', 'abc123.');
        } catch (\PDOException $e) {
            echo "Error de base de datos: " . $e->getMessage();
        }
        ?>
    </body>
</html>
