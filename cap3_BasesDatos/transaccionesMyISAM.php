<?php

/*
 * Qúe sucede cuando hacemos transacciones sobre una tabla MySqul cuyo 'engine' no permite transacciones, 
 * como es el caso de MyISAM.
 * 
 * En la base de datos dwes creé 2 tablas com la misma estructura. Una es MyISAM y la otra InnoDB. Sus nombres
 * son notransaccional y transaccional respectivamente.
 *
 * Asumimos ques estas operaciones se realizaron previamente. Probaremos alternadamente el código sobre tablas
 * InnoDB y MyISAM para verificar las diferencias
 *  
 * Revisar: Tanto si la tabla es o no transaccional, este código se ejecuta correctamente. ¿Cuál es pues la limitaciónç'
 * ¿El ejemplo es inadecuado?
 */
define('HOST', 'localhost');
define('USER', 'dwes');
define('PASSWORD', 'abc123.');
define('DB', 'dwes');

$dwes = new mysqli(HOST, USER, PASSWORD, DB);
$error = $dwes->connect_errno;
if ($error != null)
{
    print "<p>Se ha producido el error: $dwes->connect_error.</p>";
    exit();
}
$dwes->autocommit(FALSE);
$todo_bien = TRUE;
$sql = "INSERT INTO notransaccional (nombre,descripcion,unidades) values ('limones','Frutas tropicales',2)";
if ($dwes->query($sql) != TRUE)
{
    $todo_bien = FALSE;
}
error_reporting(E_ALL);
if ($todo_bien === TRUE)
{
    $dwes->commit();
    print "<p>Los cambios se han realizado correctamente.</p>";
}
else
{
    $dwes->rollback();
    print "<p>Los cambios no se han podido realizar.</p>";
}
?>
