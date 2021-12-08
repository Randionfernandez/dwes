<?php
require_once("../assets/php/database.php");
require_once("../assets/php/class.acl.php");

if (empty($_GET) and empty($_POST))
    seleccionarPermisos();

function seleccionarPermisos() {
    echo "Seleccionando permisos";
}

if (!empty($_GET)) {
    $get_action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (isset($_GET['permID']))
        $get_permID = $_GET['permID'];
    //filter_input(INPUT_GET, 'permID', FILTER_VALIDATE_INT);
}

if (!empty($_POST)) {
    $post_action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $post_permID = $_POST['permID'];
    $entero = gettype($post_permID);
    //filter_input(INPUT_POST, 'permID', FILTER_VALIDATE_INT);
    $post_permName = filter_input(INPUT_POST, 'permName', FILTER_SANITIZE_STRING);
    $post_permKey = filter_input(INPUT_POST, 'permKey', FILTER_SANITIZE_STRING);

    switch ($post_action) {
        case 'savePerm':
            $strSQL = sprintf("REPLACE INTO `permissions` SET `ID` = %u, `permName` = '%s', `permKey` = '%s'", $post_permID, $post_permName, $post_permKey);
            $conn = getConexion();
            $respuesta = $conn->query($strSQL);
            break;
        case 'delPerm':
            $strSQL = sprintf("DELETE FROM `permissions` WHERE `ID` = %u LIMIT 1", $post_permID);
            $conn = getConexion();
            $respuesta = $conn->query($strSQL);
            break;
    }
    header("location: perms.php");
}


$myACL = new ACL();
if ($myACL->hasPermission('access_admin') != true) {
    header("location: ../index.php");
}
?>

<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACL Test</title>
        <link href="../assets/css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="header"></div>
        <div id="adminButton"><a href="../">Main Screen</a> | <a href="index.php">Admin Home</a></div>
        <div id="page">
            <?php
            if (!isset($get_action) or $get_action == '') {
                ?>
                <h2>Select a Permission to Manage:</h2>
                <?php
                $permisos = $myACL->getAllPerms('full');
                $enlaces = '';
                foreach ($permisos as $permiso) {
                    echo '<a href="?action=perm&permID=' . $permiso['ID'] . '">' . $permiso['Name'] . '</a><br />';
                }
                if (count($permisos) < 1) {
                    echo "No permissions yet.<br />";
                }
                ?>
                <input type="button" name="New" value="New Permission" onclick="window.location = '?action=perm'" />
                <?php
            } else {
                if ($get_action == 'perm' and $get_permID = '') {
                    ?>
                    <h2>New Permission:</h2>
                    <?php
                } elseif ($_GET['action'] == 'perm' and $_GET['permID'] != '') {
                    ?>
                    <h2>Manage Permission: <?=
                        $myACL->getPermNameFromID($_GET['permID']);
                        ?></h2>


                    <form action="perms.php" method="post">
                        <label for="permName">Name:</label>
                        <input type="text" name="permName" id="permName" value="
                               <?= $myACL->getPermNameFromID($_GET['permID']); ?>" /><br />
                        <label for="permKey">Key:</label>
                        <input type="text" name="permKey" id="permKey" value="
                               <?= $myACL->getPermKeyFromID($_GET['permID']); ?>"
                               maxlength="30" /><br />
                        <input type="hidden" name="action" value="savePerm" />
                        <input type="hidden" name="permID" value="<?= $_GET['permID']; ?>" />
                        <input type="submit" name="Submit" value="Submit" />
                    </form>

                    <form action="perms.php" method="post">
                        $_GET['action'] == 'perm' and $_GET['permID'] != '') {           <input type="hidden" name="action" value="delPerm" />
                        <input type="hidden" name="permID" value="<?= $_GET['permID']; ?>" />
                        <input type="submit" name="Delete" value="Delete" />
                    </form>

                    <form action="perms.php" method="post">
                        <input type="submit" name="Cancel" value="Cancel" />
                    </form>
                    <?php
                } elseif ($_GET['action'] == 'perm' and $_GET['permID'] = '') {
                    
                }
            }
            ?>
        </div>
    </body>
</html>