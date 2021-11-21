<!doctype html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Solución a la tarea -->
<!-- Modificación del script original 'agenda.php', pero utilizando sesiones en lugar de campos de formulario
ocultos -->

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Agenda de contactos</title>
    </head>
    <body>
        <?php
        session_start(['cookie_lifetime' =>3600]); //p.e.,24 horas 86400)
        //$nombre= filter_input(INPUT, $variable_name)
        if (!isset($_SESSION['agenda']))
            $_SESSION['agenda'] = array(); // Creamos $agenda como un array vacío
        
        if (isset($_REQUEST['submit']))
        {
            $nuevo_nombre = trim($_REQUEST['nombre']);
            $nuevo_telefono = $_REQUEST['telefono'];
            if (empty($nuevo_nombre))
                echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";
            elseif (empty($nuevo_telefono))
                unset($_SESSION['agenda'][$nuevo_nombre]);
            else
                $_SESSION['agenda'][$nuevo_nombre] = $nuevo_telefono;
        }
        ?>



        <!-- Creamos el formulario de introducción de un nuevo contacto -->
        <h2>Nuevo contacto</h2>
        <form action="" method="get" >
            <!-- Metemos los contactos ya existentes ocultos en el formulario -->
            <div style="align-items: left">
                <label>Nombre:<input type="text" name="nombre"/></label><br />
                <label>Teléfono:<input type="text" name="telefono"/></label><br />
                <input type="submit" name='submit' value="Ejecutar"/><br />
            </div>
        </form>
        <br />

        <!-- Mostramos los contactos de la agenda -->
        <h2>Agenda</h2>
        <?php
        $agenda = $_SESSION['agenda'];
        if (count($agenda) == 0)
            echo "<p>No hay contactos en la agenda.</p>";
        else
        {
            echo "<ul>";
            foreach ($agenda as $nombre => $telefono)
                echo "<li>" . $nombre . ': ' . $telefono . "</li>";
            echo "</ul>";
        }
        ?>        
    </body>
</html>