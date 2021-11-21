<!doctype html>
<!-- Ejemplo de formulario sin validación de campos, 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sin validación</title>
    </head>
    <body>
        <?php
        // Comprobamos si se reciben datos del forumulario.
        if (isset($_GET['submit'])) {
            // recomendable usar la función filter_input() en lugar de $_GET[]
            $nombre = $_GET['nombre'] ?? '';
            $edad = $_GET['edad'] ?? '';
            $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
            var_dump($_GET);
            echo "El formulario fue correctamente procesado";
            // Aquí procesaríamos el formulario.
        } else {// 
            displayForm();
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////

        function DisplayForm() {
            ?>  
            <h1>Registro de usuario</h1>
            <form>
                <input type = "text" name = "nombre[]" 
                       placeholder="Nombre"/>
                <input type = "text" name = "nombre[]" 
                       placeholder="Edad" value = "<?= $edad; ?>"/>
                <input type = "text" name = "email" 
                       placeholder="email" value = "<?= $email; ?>"/>
                <input type = "submit" value="Palante" name="submit"/>
            </form>
            <?php
        }
        ?>
    </body>
</html>
