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

// Call this at each point of interest, passing a descriptive string
        function prof_flag($str) {
            global $prof_timing, $prof_names;
            $prof_timing[] = microtime(true);
            $prof_names[] = $str;
        }

// Call this when you're done and want to see the results
        function prof_print() {
            global $prof_timing, $prof_names;
            $size = count($prof_timing);
            for ($i = 0; $i < $size - 1; $i++) {
                echo "<b>{$prof_names[$i]}</b><br>";
                echo sprintf("&nbsp;&nbsp;&nbsp;%f<br>", ($prof_timing[$i + 1] - $prof_timing[$i]) * 1000);
            }
            echo "<b>{$prof_names[$size - 1]}</b><br>";
        }

        //////////////////////////////////////
        $dsn = "mysql:hostname=randion.es;dbname=dwes";
        $user = "dwes";
        $password = "abc123.";
        /**
         *  PDOEXception captura
         * 1) si el driver está mal escrito-> Error PDO.- Código: 0 Mensaje: could not find driver
         * 2) si la BD no existe-> Error PDO.- Código: 1049 Mensaje: SQLSTATE[42000] [1049] Unknown database 'acltest' 
         * 3) si el usuario o password no es correcto -> Error PDO.- Código: 1045 Mensaje: SQLSTATE[28000] [1045]
         *               Access denied for user 'ro3ot'@'localhost' (using password: YES)
         */
        //   try {
        prof_flag("<br/>Conectando a BD");
        $conn = new mysqli('randion.es', $user, $password, 'dwes');
        echo 'Clase $conn es de tipo: ' . get_class($conn).'<br/>';
        //$conn = new PDO($dsn, $user, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//        } catch (PDOException $e) {
//            echo "Error PDO.- Código: " . $e->getCode() . " Mensaje: " . $e->getMessage();
//            die;
//        }
        $sql = "select * from tienda";

        prof_flag("Ejecutando query");
        $resultado = $conn->query($sql);
echo 'Clase $resultado es de tipo: ' . get_class($resultado).'<br/>';
        prof_flag("Iterando resultado consulta");

        foreach($resultado as $row) echo '<br/>tienda ' . $row['cod'];
        //print $conn->server_info;

        prof_flag("Cerrando BD");
        $conn->close();
        prof_flag("Hecho");
        prof_print();
        ?>
    </body>
</html>
