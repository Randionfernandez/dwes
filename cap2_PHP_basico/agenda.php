<!doctype html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Solución a la tarea: 
    Creación de una agenda de contactos 
    No utiliza bases de datos, ni sesiones. Almacena los contactos
    dentro del formulario como campos oculos 
-->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Agenda de contactos</title>
    </head>
    <body>
        <?php
        if (isset($_GET['agenda']))
            $agenda = $_GET['agenda'];
        else
            $agenda = array(); // Creamos $agenda como un array vacío  
        
        
        if (isset($_GET['submit']))
        {
            $nuevo_nombre = filter_input(INPUT_GET,'nombre');
            $nuevo_telefono = filter_input(INPUT_GET,'telefono');
            if (empty($nuevo_nombre))
            {
                echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";
            }
            elseif (empty($nuevo_telefono))
            {
                unset($agenda[$nuevo_nombre]);
            }
            else
            {
                $agenda[$nuevo_nombre] = $nuevo_telefono;
            }
        }
        ?>

        <!-- Creamos el formulario de introducción de un nuevo contacto -->
        <h2>Nuevo contacto</h2>

        <form>
            <!-- Metemos los contactos ya existentes ocultos en el formulario -->
            <div style="align-items: left">
                <?php
                foreach ($agenda as $nom => $telf) {
                    echo '<input type="hidden" name="agenda[' . $nom . ']" ';
                    echo 'value="' . $telf . '"/>';
                }
                ?>
                <label>Nombre:<input type="text" name="nombre"/></label><br />
                <label>Teléfono:<input type="number" name="telefono"/></label><br />
                <input type="submit" name='submit' value="Ejecutar"/><br />
            </div>
        </form>
        <br />

        <!-- Mostramos los contactos de la agenda -->
        <h2>Agenda</h2>
        <?php
        if (count($agenda) == 0)
        {
            echo "<p>No hay contactos en la agenda.</p>";
        }
        else
        {
            echo "<ul>";
            foreach ($agenda as $nom => $telf) {
                echo "<li>" . $nom . ': ' . $telf . "</li>";
            }
            echo "</ul>";
        }
        ?>        
    </body>
</html>