<!DOCTYPE HTML>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Ejercicio: Transacción con MySQLi -->
<html>
    <head>
        <meta
            http-equiv= "content-type" content= "text/html; charset=UTF-8">
        <title>
            Ejercicio: Transacción con MySQLi
        </title>
    </head>
    <body>
        <?php
        $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes", 3316);
        $error = $dwes->connect_errno;
        if ($error != null)
        {
            print "<p>Se ha producido el error: $dwes->connect_error.</p>";
            exit();
        }
// Definimos una variable para comprobar la ejecución de las consultas
        $todo_bien = TRUE;

// Iniciamos la transacción. .--  Asume que tienda 2 tiene 2 unidades y la tienda 3 ninguna; no lo comprobamos
        $dwes->autocommit(false);
        $sql = 'UPDATE stock SET unidades=1 WHERE producto="3DSNG" AND tienda=2';
        if ($dwes->query($sql) != TRUE)
            $todo_bien = FALSE;
        $sql = 'INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES ("3DSNG", 3, 1)';
        if ($dwes->query($sql) != TRUE)
            $todo_bien = FALSE;
// Si todo fue bien, confirmamos los cambios
//  y en caso contrario los deshacemos
        if ($todo_bien === TRUE)
        {
            $dwes->commit();
            print "<p>Los cambios se han realizado correctamente.</p>";
        }
        else
        {
            $dwes->rollback();
            print "<p>No se han podido realizar los cambios.</p>";
        }
        $dwes->close();
        unset($dwes);
        ?>
    </body>
</html> 