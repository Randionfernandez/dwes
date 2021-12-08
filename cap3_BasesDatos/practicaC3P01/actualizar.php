<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor (Fuente: EaD)-->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página actualizar.php.- Parte de C3P01-->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Tema 3. Página actualizar.php</title>
        <?php
        $accion = filter_input(INPUT_POST, 'accion');

        switch ($accion)
        {
            case 'Cancelar':
                echo "<meta http-equiv='refresh' content='2; url=listado.php?familia=${_POST['familia']}'>";
                $mensaje = 'Cancelando...';
                break;

            case 'Actualizar': {
                    require_once 'config.php';
                    try
                    {
                        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                        $dwes = new PDO(DSN, USER, PASSWORD, $opciones);
                        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Preparamos la consulta
                        $cod = $_POST['cod'];
                        $nombre = $_POST['nombre'];
                        $nombre_corto = $_POST['nombre_corto'];
                        $descripcion = $_POST['descripcion'];
                        $PVP = $_POST['PVP'];
                        $sql = <<<SQL
UPDATE producto
SET nombre=:nombre,
nombre_corto=:nombre_corto,
descripcion=:descripcion,
PVP=:PVP
WHERE cod=:cod
SQL;
// Preparamos la consulta
                        $consulta = $dwes->prepare($sql);
                        $consulta->bindParam(":cod", $cod);
                        $consulta->bindParam(":nombre", $nombre);
                        $consulta->bindParam(":nombre_corto", $nombre_corto);
                        $consulta->bindParam(":descripcion", $descripcion);
                        $consulta->bindParam(":PVP", $PVP);
// Y la ejecutamos
                        $consulta->execute();
                        $mensaje = "Se han actualizado los datos.";
                        unset($consulta);
                        unset($dwes);
                    }
                    catch (PDOException $e)
                    {
                        $error = $e->getCode();
                        $mensaje = $e->getMessage();
                    }
                    break;
                }
            default : $mensaje = "Error: Opción de actualización no válida";
        }
        ?>

    </head>

    <body>

        <?php
        echo $mensaje . "<br />";

        // Creamos un formulario para volver al listado.- Tenemos 2 versiones
        // Versión 1.- El valor de 'familia' va en la url
        echo "<form action='listado.php?familia=${_POST['familia']}' method='post'>";
        echo "<input type='submit' value='Continuar'/>";
        echo "</form>";

        // Versión 2.- El valor de 'familia' está como campo oculto del formulario
        //            echo "<form action='listado.php' method='post'>";
        //// Metemos como oculto el código de la familia
        //            echo "<input type='hidden' name='familia' value='${_POST['familia']}'/>";
        //            echo "<input type='submit' value='Continuar'/>";
        //            echo "</form>";
        ?>
    </body>
</html>