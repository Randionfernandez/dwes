<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conexión</title>
    </head>
    <body>
        <?php
        define('HOST', 'localhost');
        define('USER', "dwes");
        define('PASSWORD', 'abc123.');
        define('DBNAME', 'dwes');

        $conn = new mysqli(HOST, USER, PASSWORD, DBNAME);
        // Devuelve un objeto de tipo mysqli o valor 0 si algo ha fallado.
        $error = $conn->connect_errno;
        //$conn = mysqli_connect();

        if ($error != null)
        //if ($conn == null)
        {
            echo "<p>Error $error conectando a la base de datos: $conn->connect_error</p>";
            exit();
        }

        $sql = "select * from tienda";
        //$sql= 'desc tienda';
        $result = $conn->query($sql);


        /*
         * __________________________   Recorrer resultados  ______________________
         */

        /* _______________________________________________________________
         * 1ª  Forma
         * 
         * Nota: Usando el iterador foreach no podemos usar índices numéricos, solo
         * índices asociativos
         * _______________________________________________________________
         */
//        foreach ($result as $row)  echo '<br/>tienda ' . $row['cod'];


        /* _______________________________________________________________
         * 2ª forma
         * Nota: con while podemos usar 
         * índices aso+ciativos con $result->fetch_assoc()
         * índices numéricos con $result->fetch_row()
         * índices numéricoS o asociativos, indistintamente, con $result->fetch_array()
         * _______________________________________________________________
         */
        while ($row = $result->fetch_assoc()) {
            echo '<br/>tienda ' . $row['cod'];
        }

        /* _______________________________________________________________
         * 3ª forma      Obviamente mejor cualquiera de las dos anteriores
         * _______________________________________________________________
         */
//        $row = $result->fetch_assoc();
//        echo '<br/>tienda ' . $row['cod'];
//        $row = $result->fetch_assoc();
//        echo '<br/>tienda ' . $row['cod'];
//        $row = $result->fetch_assoc();
//        echo '<br/>tienda ' . $row['cod'];
        //        print $conn->server_info;
        $conn->close();
        ?>
    </body>
</html>
