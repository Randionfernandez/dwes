<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Cookies en autentificación HTTP -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>
            Ejemplo Tema 4: Cookies en autentificación HTTP
        </title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        /* __________________________________________________________________________________
          |
          |            Versión modificada--
          |   Corrige 2 notice, un warning, detecta error de conexión a la B.D y
          |   registra la primera visita, al contrario que la versión original DWES4_3_2
          |  ________________________________________________________________________________
         */

// Si el usuario aún no se ha autentificado, pedimos las credenciales
        if (!isset($_SERVER ['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="Contenido restringido"');
            header("HTTP/1.0 401 Unauthorized");
            exit;
        }

// Vamos a guardar el usuario en una variable de sesión
//  si no existe es que aún no se ha autentificado
        session_start();

        $error = null;  // necesario para evitar un 'Notice'.Randion

        if (!isset($_SESSION ['usuario'])) {
// Conectamos a la base de datos
            $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
            echo "La contraseña de acceso a la BD es: " . md5('abc123.') . '<br/>';
            $error = $dwes->connect_errno;

// Si se estableció la conexión
            if ($error == null) {
// Ejecutamos la consulta para comprobar si existe
//  esa combinación de usuario y contraseña
                $sql = "SELECT usuario FROM usuarios WHERE usuario='${_SERVER['PHP_AUTH_USER']}' AND contrasena=md5('${_SERVER['PHP_AUTH_PW']}')";
                $resultado = $dwes->query($sql);

// Si no valida nombre y contraseña en la tabla 'usuarios', se vuelven a pedir las credenciales
                if ($resultado->num_rows == 0) {
                    header('WWW-Authenticate: Basic realm="Contenido restringido"');
                    header("HTTP/1.0 401 Unauthorized");
                    exit;
                } else {
                    $_SESSION ['usuario'] = $_SERVER ['PHP_AUTH_USER'];
                }
                $resultado->close();
                $dwes->close();
            } else {   // Añadido para controlar fallos de conexión en la B:D.--randion
                echo "Error de conexión comprobando la identidad del usuario";
                exit;
            }
        }

// Si ya está autentificado
// Comprobamos si se ha enviado el formulario de limpiar el registro
        if (isset($_POST ['limpiar']))
//    unset($_SESSION ['visita']);  // reemplazado para evitar Notice: variable no definida más abajo
            $_SESSION['visita'] = array();  // 
        else  // sin comentar no registraría el instante de la primera visita
            $_SESSION ['visita'][] = time();

        if ($error == null) {
            echo "Nombre de usuario: " . $_SERVER ['PHP_AUTH_USER'] . "<br />";
            echo "Hash de la contraseña: " . md5($_SERVER ['PHP_AUTH_PW']) . "<br />";
            if (count($_SESSION ['visita']) == 0) {
                echo "Bienvenido. Esta es su primera visita.";
                $_SESSION['visita'][] = time();
            } else {
                date_default_timezone_set('Europe/Madrid');
                echo '<p>Nos has visitado estas veces:<br />';
                foreach ($_SESSION ['visita'] as $v)
                    echo date("d/m/y \a \l\a\s H:i:s", $v) . "<br />";
                ?>
                <form id='vaciar' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
                    <input type='submit' name='limpiar' value='Limpiar registro' />
                </form>
                <?php
            }
        } else
            echo "Se ha producido el error $error.<br />";
        ?>
    </body>
</html>