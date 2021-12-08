<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        $CFG = new stdClass();
        $CFG->dsn = "pgsql:host=randion.es;dbname=comunidad_db";
        $CFG->dbuser = "comunidad_usr";
        $CFG->dbpass = "manegot";

        try {
            $conn = new PDO($CFG->dsn, $CFG->dbuser, $CFG->dbpass);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

        $gsent = $conn->prepare("SELECT n_op, importe, concepto FROM movimientosbmn");
        $gsent->execute();

        /* Prueba de tipos de PDOStatement::fetch */
        print("<br/>PDO::FETCH_ASSOC: ");
        print("<br/>Devolver la siguiente fila como un array indexado por nombre de columna\n");
        $result = $gsent->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        print("\n");

        print("<br/>PDO::FETCH_NUM: ");
        print("<br/>Devolver la siguiente fila como un array indexado por número de columna\n");
        $result = $gsent->fetch(PDO::FETCH_NUM);
        print_r($result);
        print("\n");

        print("<br/>PDO::FETCH_BOTH: ");
        print("<br/>Devolver la siguiente fila como un array indexado por nombre y número de columna\n");
        $result = $gsent->fetch(PDO::FETCH_BOTH);
        print_r($result);
        print("\n");

        print("<br/>PDO::FETCH_LAZY: ");
        print("<br/>Devolver la siguiente fila como un objeto anónimo con nombres de columna como propiedades\n");
        $result = $gsent->fetch(PDO::FETCH_LAZY);
        print_r($result);
        print("\n");

        print("<br/>PDO::FETCH_OBJ: ");
        print("<br/>Devolver la siguiente fila como un objeto anónimo con nombres de columna como propiedades\n");
        $result = $gsent->fetch(PDO::FETCH_OBJ);
        print $result->concepto;
        print("\n");
        ?>
    </body>
</html>
