<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        define('DSN', "mysql:host=localhost;dbname=dwes");
        define('USER', 'dwes');
        define('PASSWORD', 'abc123.');

        /**
         *  PDOEXception captura
         * 1) si el driver está mal escrito-> Error PDO.- Código: 0 Mensaje: could not find driver
         * 2) si la BD no existe-> Error PDO.- Código: 1049 Mensaje: SQLSTATE[42000] [1049] Unknown database 'acltest' 
         * 3) si el usuario o password no es correcto -> Error PDO.- Código: 1045 Mensaje: SQLSTATE[28000] [1045]
         *               Access denied for user 'ro3ot'@'localhost' (using password: YES)
         */
        try
        {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conn = new PDO(DSN, USER, PASSWORD, $opciones);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT nombDDre_corto FROM producto";
            $filas = $conn->query($sql);
        }
        catch (PDOException $e)
        {
            echo 'Fallo de conexión a bases de datos: ' . $e->getMessage();
        }
        catch (Exception $e)
        {
            echo 'Fallo desconocido al efectuar consulta a la B.D.:' . $e->getMessage();
        }




//        foreach ($filas as $fila) {
//            echo $fila['producto'] . '<p/><br />';
//        }

        $filas->bindColumn(1, $nombreCorto);

        while ($fila = $filas->fetch(PDO::FETCH_NUM)) {
            echo '<p>' . $nombreCorto . '<p/>';
        }
        echo "Finalizando el script";
        ?>

    </body>
</html>
