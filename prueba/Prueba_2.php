<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario pregunta 5</title>
    </head>
    <body>
        <main>
            <?php
            $errores = array();

            if (isset($_POST['enviarDatos'])) {
                $nombre = filter_input(INPUT_POST, 'firstNameForm', FILTER_CALLBACK, array('options' => 'validateNombre'));
                $apellido = filter_input(INPUT_POST, 'lastNameForm', FILTER_CALLBACK, array('options' => 'validateApellido'));
                $fecha = filter_input(INPUT_POST, 'dateForm');
                $primerFichero = $_FILES['firstFileName'];
                $segundoFichero = $_FILES['secondFileName'];
                if (!count($errores) && (moverPrimerArchivo() === true && moverSegundoArchivo() === true)) {
                    imprimir();
                } else {
                    echo "Validación Fallida: ";
                    createFormValidate($errores);
                }
            }

            function moverPrimerArchivo(): bool {
                global $errores;
                global $primerFichero;
                if (($primerFichero['error'] === 0)) {
                    move_uploaded_file($primerFichero['tmp_name'], __DIR__ . '/subidos/' . $primerFichero['name']);
                    return true;
                }
                $errores[] .= "Error subida: Ha habido un error en la subida del primer archivo.";
                return false;
            }

            function moverSegundoArchivo(): bool {
                global $errores;
                global $segundoFichero;
                if (($segundoFichero['error'] === 0)) {
                    move_uploaded_file($segundoFichero['tmp_name'], __DIR__ . '/descargas/' . $segundoFichero['name']);
                    return true;
                }
                $errores[] .= "Error subida: Ha habido un error en la subida del segundo archivo.";
                return false;
            }

            function validateNombre($name): string {
                global $errores;
                $nombre = trim($name);

                if (is_string($nombre) && (strlen($nombre) > 2) && (strlen($nombre) < 30)) {
                    return $name;
                }
                $errores[] .= "Error nombre: debe tener al menos 2 caracteres alfanuméricos.";
                return '';
            }

            function validateApellido($lastName): string {
                global $errores;
                $apellido = trim($lastName);

                if (is_string($apellido) && (strlen($apellido) > 3) && (strlen($lastName) < 40)) {
                    return $lastName;
                }
                $errores[] .= "Error apellido: debe tener al menos 2 caracteres alfanuméricos.";
                return '';
            }

            function createFormValidate($errors) {
                if (count($errors)) {
                    foreach ($errors as $error) {
                        echo "<br>$error";
                    }
                    echo "<br/>Codificación JSON: " . json_encode($errors);
                }
            }

            function imprimir() {
                global $nombre;
                global $apellido;
                global $fecha;
                global $primerFichero;
                global $segundoFichero;
                echo "<section><p>Nombre: '$nombre'.<br>Apellidos: '$apellido'.<br>Fecha: '$fecha'</p>" .
                "<p>Primer Fichero: <br> Nombre: '" . $primerFichero['name'] . "'. <br> Tamaño: '" . $primerFichero['size'] . "' bytes.</p>
            <p>Segundo Fichero: <br> Nombre: '" . $segundoFichero['name'] . "'. <br> Tamaño: '" . $segundoFichero['size'] . "' bytes.</p>
            </section>";
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <label for="nombre">
                    Nombre:
                </label>
                <input id="nombre" type="text" name="firstNameForm">
                <label for="apellidos">
                    Apellidos:
                </label>
                <input id="apellidos" type="text" name="lastNameForm">
                <label for="fecha">
                    Fecha:
                </label>
                <input id="fecha" type="date" name="dateForm">
                <label for="primerFichero">
                    Primer Fichero:
                </label>
                <input id="primerFichero" type="file" name="firstFileName">
                <label for="segundoFichero">
                    Segundo Fichero:
                </label>
                <input id="segundoFichero" type="file" name="secondFileName">
                <input type="submit" name="enviarDatos" value="Enviar">
            </form>
        </main>
    </body>
</html>
