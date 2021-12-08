<?php
include("assets/php/database.php");
include("assets/php/class.acl.php");


// Identifica al usuario actual. Normalmente se identificaría en un script de login.
// Aquí se fija en usuario 1, que en la B.D. estará asociado al usuario Admin Steve
$_SESSION['userID'] = 1;    

// ACL perteneciente al usuario actual. Al carecer de sistema de login que identifique al usuario
// siempre será userID = 1; mientras no se cambie para obtener su valor a partir de un login.
//$myACL = new ACL($_SESSION['userID']);

if (isset($_GET['userID']))
{
    $userID = $_GET['userID'];
}
else
{
    $userID = $_SESSION['userID'];
}
?>

<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACL Test</title>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="header"></div>
        <div id="adminButton"><a href="admin/">Admin Screen</a></div>
        <div id="page">
            <h2>Permissions for  
            <?php
            $userACL = new ACL($userID);
            echo $userACL->getUsername($userID);
            ?>
                :</h2>
            <?php
            $aPerms = $userACL->getAllPerms('full');
            foreach ($aPerms as $k => $v) {
                echo "<strong>" . $v['Name'] . ": </strong>";
                echo "<img src=\"assets/img/";
                if ($userACL->hasPermission($v['Key']) === true)
                {
                    echo "allow.png";
                    $pVal = "Allow";
                }
                else
                {
                    echo "deny.png";
                    $pVal = "Deny";
                }
                echo "\" width=\"16\" height=\"16\" alt=\"$pVal\" /><br />";
            }
            ?>
            <h3>Change User:</h3>
            <?php
            $strSQL = "SELECT * FROM `users` ORDER BY `Username` ASC";
            $conn = getConexion();
            $rows = $conn->query($strSQL, PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo "<a href=\"?userID=" . $row['ID'] . "\">" . $row['username'] . "</a><br />";
            }
            ?>
        </div>
    </body>
</html>