<?php
require_once("../assets/php/database.php");
require_once("../assets/php/class.acl.php");



if (!empty($_GET))
{
    $get_action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (isset($_GET['permID']))
    {
        $get_permID = filter_input(INPUT_GET, 'permID', FILTER_SANITIZE_STRING);
    }
}

if (!empty($_POST))
{
    $post_action = filter_input(INPUT_POST, 'accion', FILTER_SANITIZE_STRING);
    $post_permID = filter_input(INPUT_POST, 'permID', FILTER_SANITIZE_STRING, FILTER_SANITIZE_NUMBER_FLOAT);
    $post_permName = filter_input(INPUT_POST, 'permName', FILTER_SANITIZE_STRING);
    $post_permKey = filter_input(INPUT_POST, 'permKey', FILTER_SANITIZE_STRING);

    switch ($post_action)
    {
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
        case 'cancel':
            break;
        default:
            break;
    }
    header("location: perms.php");
}


$myACL = new ACL();
if (!$myACL->hasPermission('access_admin'))
{
    header("location: ../index.php");
}
?>

<!doctype html>
<html>
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
            if (empty($_GET) && empty($_POST))
            {
                seleccionarPermisos($myACL);
            }
            elseif (isset($_GET['action']))
            {

                switch ($get_action)
                {
                    case 'insertar':
                        insertar($myACL);
                        break;
                    case 'borrar':
                    case 'cancelar':
                        break;
                    case 'actualizar':
                        actualizarPermiso($myACL, $get_permID);
                        break;
                    default :
                }
            }

            /**
             * 
             */
            function seleccionarPermisos($myACL)
            {
                ?>
                <h2>Select a Permission to Manage:</h2>
                <?php
                $permisos = $myACL->getAllPerms('full');
                foreach ($permisos as $permiso) {
                    echo '<a href="?action=actualizar&permID=' . $permiso['ID'] . '">' . $permiso['Name'] . '</a><br />';
                }
                if (count($permisos) < 1)
                {
                    echo "No permissions yet.<br />";
                }
                ?>
                <input type="button" name="New" value="New Permission" onclick="window.location = '?action=insertar'" />
                <?php
            }

            /**
             * 
             */
            function actualizarPermiso($myACL, $permID)
            {
                ?>
                <h2>Manage Permission: <?= $myACL->getPermNameFromID($permID);
                ?></h2>


                <form action="" method="post">
                    <label for="permName">Name:</label>
                    <input type="text" name="permName" id="permName" value="
                           <?= $myACL->getPermNameFromID($permID); ?>" /><br />
                    <label for="permKey">Key:</label>
                    <input type="text" name="permKey" id="permKey" value="
                           <?= $myACL->getPermKeyFromID($permID); ?>" /><br />

                    <input type="hidden" name="permID" value="<?= $permID; ?>" />

                    <input type="submit" name="accion" value="savePerm" />
                    <input type="submit" name="accion" value="delPerm" />
                    <input type="submit" name="accion" value="cancel" />
                </form>
                <?php
            }

            /**
             * 
             * 
             * @param type $myACL        El parámetro se usaba en la versión original
             */
            function insertar()
            {
                ?>
                <h2>New Permission: </h2>

                <form method="post">
                    <label for="permName">Name:</label>
                    <input type="text" name="permName" id="permName" value="" /><br />
                    <label for="permKey">Key:</label>
                    <input type="text" name="permKey" id="permKey" value="" /><br />

                    <input type="submit" name="accion" value="savePerm" />
                    <input type="submit" name="accion" value="cancel" />
                </form>
                <?php
            }

            /**
             * 
             */
            function cancelar()
            {
                header("location: perms.php");
            }
            ?>

        </div>
    </body>
</html>