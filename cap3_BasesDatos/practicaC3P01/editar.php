<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página editar.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Tarea Tema 3. Página editar.php</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        require_once 'config.php';
// Se debe recibir el código del producto a editar
        $cod = filter_input(INPUT_POST, 'producto');
        $mensaje = "";
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
            <h1>Tarea: Edición de un producto</h1>
        </div>


        <div id="contenido">
            <h2>Producto:</h2>
            <?php
// Se obtienen todos los datos de ese producto
            if (!isset($error))
            {
                $sql = <<<SQL
SELECT nombre, nombre_corto, descripcion, PVP, familia
FROM producto
WHERE cod='$cod'
SQL;
                $resultado = $dwes->query($sql);
                if ($resultado)
                {
// Creamos un formulario con los datos del producto
                    $row = $resultado->fetch();

//                    echo "<form id='editar' action='actualizar.php' method='post'>";
//// Metemos oculto el código de producto
//                    echo "<input type='hidden' name='cod' value='$cod'/>";
//// Y el código de la familia
//                    echo "<input type='hidden' name='familia' value='${_POST['familia']}'/>";
//                    echo "<p>Nombre corto: ";
//                    echo "<input type='text' name='nombre_corto' size='60' maxlength='50'
//value='${row['nombre_corto']}' /></p>";
//                    echo "<p>Nombre: </p>";
//                    echo "<textarea name='nombre' cols='60' rows='3'>" .
//                    $row['nombre'] . "</textarea>";
//                    echo "<p>Descripción: </p>";
//                    echo "<textarea name='descripcion' cols='60' rows='8'>" .
//                    $row['descripcion'] . "</textarea>";
//                    echo "<p>PVP: " .
//                    "<input type='text' size='10' name='PVP' value='${row['PVP']}' /></p>";
//                    echo "<p><input type='submit' name='accion' value='Actualizar'/>";
//                    echo "<input type='submit' name='accion' value='Cancelar'/></p>";
//                    echo "</form>";
///////////////////              P R U E B A 
                    echo <<<FORM
<form id = 'editar' action = 'actualizar.php' method = 'post'>
<!-- // Metemos oculto el código de producto -->
<input type = 'hidden' name = 'cod' value = '$cod'/>
<!-- // Y el código de la familia -->
<input type='hidden' name='familia' value='${_POST['familia']}'/>
<p>Nombre corto: 
<input type='text' name='nombre_corto' size='60' maxlength='50'
value='${row['nombre_corto']}' /></p>
<p>Nombre: </p>
<textarea name='nombre' cols='60' rows='3'>${row['nombre']} </textarea>
<p>Descripción: </p>
<textarea name='descripcion' cols='60' rows='8'>${row['descripcion']} </textarea>
<p>PVP:<input type='text' size='10' name='PVP' value='${row['PVP']}' /></p>
<p><input type='submit' name='accion' value='Actualizar'/>
<input type='submit' name='accion' value='Cancelar'/></p>
</form>
FORM;

////////////////////////   F I N     P R U E B A             //////////////////////////////////////////////////////////                    
                }
                else
                {
                    $error = true;
                    $mensaje = "No se ha encontrado el producto!";
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
                //unset($dwes);
                $dwes = null;
            }
            ?>
        </div>
    </body>
</html>