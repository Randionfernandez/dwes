  <?php

session_start();
//ob_start();     // activa buffer de salida
$hasDB = false; // booleano, cierto si estamos conectados
define('DSN', "mysql:host=localhost;dbname=acl_test");
define('USER', 'dwes');
define('PASS', 'abc123.');

$db = 'acl';

function getConexion()
{
    static $conn = null;

    if ($conn == null)
    {
        try
        {
            $conn = new PDO(DSN, USER, PASS);
            $hasDB = true;
        }
        catch (PDOException $e)
        {
            echo "Could not connect to the MySQL server at localhost.-". $e->getMessage();
            die();
        }
    }
    return $conn;
}

?>