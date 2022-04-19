<!doctype html>
<!-- 
  Ejemplo de tratamiento de los fichero subidos al servidor desde un formulario.

    type  Tipo mime del archivo.- Se base en la extensión, no en analizar el contenido
        por tanto, el dato no es muy fiable.


-----------  ToDo  ------------
* Mejorar el tratamiento de errores.  Ver  https://www.php.net/manual/es/features.file-upload.errors.php
* Modificarlo para procesar input con atributo múltiple (seleccionar más de un fichero
por cada control <input  type="file"  ...   multiple>
* Añadir error 3 a las diapositivas del curso.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Subir archivos</title>
    </head>
    <body>
        <?php
        if (filter_input(INPUT_POST, 'Subir', FILTER_SANITIZE_STRING)) {
//            var_dump($_FILES);

            foreach ($_FILES as $file) {
                switch ($file['error']) {
                    case UPLOAD_ERR_OK: { // error == 0  - No hay error, fichero subido con éxito.
                            if (!move_uploaded_file($file['tmp_name'], 'subidas/' . $file['name'])) {
                                echo "Falló mover archivo a carpeta permanente";
                            };
                            break;
                        }
                    case UPLOAD_ERR_INI_SIZE: break;   // error == 1  - El fichero subido excede la directiva upload_max_filesize de php.ini. 
                    case UPLOAD_ERR_FORM_SIZE: break;  // error == 2  - El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.
                    case UPLOAD_ERR_PARTIAL: break;    // error == 3  - El archivo subido solo parcialmente.
                    case UPLOAD_ERR_NO_FILE: echo "No se subió ningún fichero";  // error == 4   No se subió ningún fichero.
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR: break;  // error == 6  - Falta la carpeta temporal. 
                    case UPLOAD_ERR_CANT_WRITE: break;  // error == 7  - No se pudo escribir el fichero en el disco.
                    case UPLOAD_ERR_EXTENSION: break;   // error == 8  - Una extensión de PHP detuvo la subida de ficheros. 
                    // PHP no proporciona una forma de determinar la extensión que causó la parada de la subida de ficheros;
                    // el examen de la lista de extensiones cargadas con phpinfo() puede ayudar.

                    default : echo "Hubo un error de código desconocido: " . $file['error'] . ", al subir el fichero";
                        break;
                }
            }
        }
        ?>

        <form method = "post" enctype = "multipart/form-data">

            <h3>Escoge dos archivos</h3>

            <label for = "archivoSeleccionado1">Seleccione archivo: </label>
            <input type = "file" name = "archivoSeleccionado1" id = "archivoSeleccionado1" value = "" />

            <label for = "archivoSeleccionado2"><br/>Seleccione archivo: </label>
            <input type = "file" name = "archivoSeleccionado2" id = "archivoSeleccionado2" value = "" />
            <br/>
            <input type = 'submit' name = "Subir"/>
        </form>
    </body>
</html>