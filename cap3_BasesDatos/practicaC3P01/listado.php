<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página listado.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Tema 3. Página listado.php</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        require_once 'config.php';
        $mensaje = "";
        $familia = "";
        if (isset($_REQUEST['familia']))
            $familia = $_REQUEST['familia'];
        try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dwes = new PDO(DSN, USER, PASSWORD, $opciones);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        ?>
        <div id="encabezado">
            <h1>Tarea: Listado de productos de una familia</h1>
            <form id="form_seleccion" method="post">
                <span>Familia: </span>
                <select name="familia"> 
                    <?php
                    if (!isset($error))
                    {
// Rellenamos el desplegable con los datos de todas las familias
                        $sql = "SELECT cod, nombre FROM familia";
                        $resultado = $dwes->query($sql);
                        if ($resultado)
                        {
                            $row = $resultado->fetch();
                            while ($row != null) {
                                echo "<option value='${row['cod']}'";
// Si se recibió un código de familia lo seleccionamos
// en el desplegable usando selected='true'
                                if ($familia == $row['cod'])
                                    echo " selected='true'";
                                echo ">${row['nombre']}</option>";
                                $row = $resultado->fetch();
                            }
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Mostrar productos" name="enviar"/>
            </form>
        </div>

        <div id="contenido">
            <h2>Productos de la familia:</h2>
            <?php
// Si se recibió un código de familia y no se produjo ningún error
// mostramos los productos de esa familia
            if (!isset($error))
            {
                $sql = <<<SQL
SELECT cod, nombre_corto, PVP
FROM producto
WHERE familia='$familia'
SQL;
                $resultado = $dwes->query($sql);
                if ($resultado)
                {
// Creamos un formulario por cada producto obtenido
                    $row = $resultado->fetch();
                    while ($row != null) {
                        echo "<p><form id='${row['cod']}' action='editar.php' method='post'>";
// Metemos oculto el código de producto
                        echo "<input type='hidden' name='producto' value='" . $row['cod'] . "'/>";
// Y el código de la familia
                        echo "<input type='hidden' name='familia' value='" . $familia . "'/>";
                        echo "Producto ${row['nombre_corto']}: ";
                        echo $row['PVP'] . " euros.";
                        echo "<input type='submit' value='Editar'/>";
                        echo "</form>";
                        echo "</p>";
                        $row = $resultado->fetch();
                    }
                }
            }
            ?>
        </div>
        <div id="pie">
            <?php
            if (isset($error))
                echo "<p>Se ha producido un error! $mensaje</p>";
            else
            {
                echo $mensaje;
                unset($dwes);
            }
            ?>
        </div>
    </body>
</html>