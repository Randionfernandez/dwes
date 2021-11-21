<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>Adivina mi número</title>
        <link rel="stylesheet" type="text/css" href="Ejemplos_de_formularios/common.css" />
    </head>
    <body>
        <!-- Desarrollo Web en Entorno Servidor -->
        <!-- Fuente: Fundamentos PHP práctico -->
        <!-- Capítulo 9, Ejercicio1 pag. 306 -->
        <!-- Solución del autor -->
        <?php
        /**
         * Examen 1ª evaluación. Solución al ejercicio 5. Fecha examen 20151202
         * 
         * Adivina un número. El jugador debe adivinar un número generado aleatoriamente en un
         * número limitado de intentos. En cada intento el programa informa si el número introducido
         * es mayor o menor que el número buscado.
         * 
         * Conservación de la información realizada con campos ocultos en el formulario.
         *            $size = N;
          $numero_correcto= rand(1,MAX);
         * Contiene algunos atributos HTML5
         */
        /* Constantes que limitan entre MINIMO Y MAXIMO el rango del número aleatorio generado. */
        define('MINIMO', 1);
        define('MAXIMO', 50);
        /* MAX_INTENTOS, número de intentos disponibles para el usuario */
        define('MAX_INTENTOS', 6);
        echo "<h1>Adivina mi número (Entre " . MINIMO . ' y ' . MAXIMO . ')</h1>';

        if (isset($_POST["submitButton"]) and isset($_POST["sera_este"]))
        {
            processForm();
        }
        else
        {
            displayForm(rand(MINIMO, MAXIMO));
        }

        /**
         * 
         */
        function processForm()
        {
            $adivina = (int) filter_input(INPUT_POST, "adivina", FILTER_VALIDATE_INT);
            $intentos = (int) $_POST["intentos"] - 1;
            $sera_este = (int) $_POST["sera_este"];

            if ($sera_este == $adivina)
            {
                displaySuccess($adivina);
            }
            elseif ($intentos == 0)
            {
                displayFailure($adivina);
            }
            elseif ($sera_este < $adivina)
            {
                displayForm($adivina, $intentos, "Demasiado bajo - ¡Prueba otra vez!");
            }
            else
            {
                displayForm($adivina, $intentos, "Demasiado alto - ¡Prueba otra vez!");
            }
        }

        /**
         * 
         * @param int $adivina  Número generado aleatoriamente y que debe ser adivinado.
         * @param int $intentos Número de intentos aún disponibles para el jugador.
         * @param int $mensaje  Informa si se pasó o se quedó corto en el intento.
         */
        function displayForm($adivina, $intentos = MAX_INTENTOS, $mensaje = "")
        {
            ?>
            <form method="post">
                <div>
                    <!--    prueba de valores múltiples
                                        <input type="text" name="borrar[]" value="" />
                                        <input type="text" name="borrar[]" value="" />
                    -->
                    <input type="hidden" name="adivina" value="<?php echo $adivina ?>" />
                    <input type="hidden" name="intentos" value="<?php echo $intentos ?>" />
                    <?php if ($mensaje) echo "<p>$mensaje</p>" ?>
                    <p>¡Tienes <?php echo $intentos ?> 
                        <?php echo ( $intentos == 1 ) ? "intento" : "intentos" ?> para adivinarlo!</p>
                    <p>¿Cuál crees que es? 
                        <input type="number" name="sera_este" value="" autofocus required min="<?php echo MINIMO; ?>" 
                               max="<?php echo MAXIMO; ?>" style="float: none; width: 3em;" />
                        <input type="submit" name="submitButton" value="Intentar" style="float: none;" /></p>
                </div>
            </form>
            <?php
        }

        /**
         * 
         * @param int $adivina Ver definición en función displayForm.
         */
        function displaySuccess($adivina)
        {
            ?>
            <h2>¡Enhorabuena!</h2>
            <p>Has adivinado mi número: <?php echo $adivina ?>!</p>

            <form action="" method="post">
                <p><input type="submit" name="OtroJuego" value="Otro juego" autofocus style="float: none;" /></p>
            </form>
            <?php
        }

        /**
         * 
         * @param int $adivina  Ver definición en función displayForm.
         */
        function displayFailure($adivina)
        {
            ?>
            <h2>¡Mala suerte!</h2>
            <p>Has agotado los intentos. ¡Mi número era el <?php echo $adivina ?>!</p>

            <form action="" method="post">
                <p><input type="submit" name="OtroJuego" value="Otro juego" autofocus style="float: none;" /></p>
            </form>
            <?php
        }
        ?>
    </body>
</html>
