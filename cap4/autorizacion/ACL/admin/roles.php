<?php
require_once("../assets/php/database.php");
require_once("../assets/php/class.acl.php");

// Aclarar si 'action' entra por get o post o ambos y corregir consecuentemente en las lineas siguiente.
// Parece que ambas; buscar aquí 'window.location'
$get_roleID = filter_input(INPUT_GET, 'roleID', FILTER_SANITIZE_NUMBER_INT);
$get_action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$myACL = new ACL();
$conn = getConexion();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action)
{
    $_post_roleID = filter_input(INPUT_POST, 'roleID', FILTER_SANITIZE_NUMBER_INT);
    $_post_roleName = filter_input(INPUT_POST, 'roleName', FILTER_SANITIZE_STRING);
    switch ($action)
    {
        case 'saveRole':
            $strSQL = sprintf("REPLACE INTO `roles` SET `ID` = %u, `roleName` = '%s'", $_post_roleID, $_post_roleName);
            $respuesta = $conn->query($strSQL);
            if ($respuesta->rowCount() > 1)
            {
                $roleID = $_POST['roleID']; // refactorizar con $_post_roleID
            }
            else
            {
                $roleID = $conn->lastInsertId();
            }
            foreach ($_POST as $k => $v) {
                if (substr($k, 0, 5) == "perm_")
                {
                    $permID = str_replace("perm_", "", $k);
                    if ($v == 'X')
                    {
                        $strSQL = sprintf("DELETE FROM `role_perms` WHERE `roleID` = %u AND `permID` = %u", $roleID, $permID);
                        $respuesta = $conn->query($strSQL);
                        continue;
                    }
                    $strSQL = sprintf("REPLACE INTO `role_perms` SET `roleID` = %u, `permID` = %u, `value` = %u, `addDate` = '%s'", $roleID, $permID, $v, date("Y-m-d H:i:s"));
                    $respuesta = $conn->query($strSQL);
                }
            }
            header("location: roles.php");
            break;
        case 'delRole':
            $strSQL1 = sprintf("DELETE FROM `roles` WHERE `ID` = %u LIMIT 1", $_POST['roleID']);
            $respuesta1 = $conn->query($strSQL);
            $strSQL2 = sprintf("DELETE FROM `user_roles` WHERE `roleID` = %u", $_POST['roleID']);
            $respuesta2 = $conn->query($strSQL);
            $strSQL3 = sprintf("DELETE FROM `role_perms` WHERE `roleID` = %u", $_POST['roleID']);
            $respuesta3 = $conn->query($strSQL);
            header("location: roles.php");
            break;
    }
}
if ($myACL->hasPermission('access_admin') != true)
{
    header("location: ../index.php");
}
?>
<!doctype html>

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
        if (!isset($get_action) || ($get_action == ''))
        {
            ?>
            <h2>Select a Role to Manage:</h2>
            <?php
            $roles = $myACL->getAllRoles('full');
            foreach ($roles as $k => $v) {
                echo "<a href=\"?action=role&roleID=" . $v['ID'] . "\">" . $v['Name'] . "</a><br />";
            }
            if (count($roles) < 1)
            {
                echo "No roles yet.<br />";
            }
            ?>
            <input type="button" name="New" value="New Role" onclick="window.location = '?action=role&roleID=\'\''" />
            <?php
        }
        elseif (isset($get_action) && ($get_action == 'role'))
        {
            if ($get_roleID == '')
            {
                ?>
                <h2>New Role:</h2>

                <?php
            }
            else
            {
                ?>
                <h2>Manage Role: (<?= $myACL->getRoleNameFromID($get_roleID); ?>)</h2>
                <form method="post">
                    <label for="roleName">Name:</label>
                    <input type="text" name="roleName" id="roleName" value="<?= $myACL->getRoleNameFromID($get_roleID); ?>" />
                    <table border="0" cellpadding="5" cellspacing="0">
                        <tr><th></th><th>Allow</th><th>Deny</th><th>Ignore</th></tr>
                        <?php
                        $rPerms = $myACL->getRolePerms($get_roleID);
                        $aPerms = $myACL->getAllPerms('full');
                        foreach ($aPerms as $k => $v) {
                            echo "<tr><td><label>" . $v['Name'] . "</label></td>";
                            echo "<td><input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_1\" value=\"1\"";
                            if (isset($rPerms[$v['Key']]['value']) && ($rPerms[$v['Key']]['value'] === TRUE) && ($get_roleID != ''))
                            {
                                echo " checked=\"checked\"";
                            }
                            echo " /></td>";
                            echo "<td><input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_0\" value=\"0\"";
                            if (isset($rPerms[$v['Key']]['value']) && ($rPerms[$v['Key']]['value'] != TRUE) && ($get_roleID != ''))
                            {
                                echo " checked=\"checked\"";
                            }
                            echo " /></td>";
                            echo "<td><input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_X\" value=\"X\"";
                            if ($get_roleID == '' || !array_key_exists($v['Key'], $rPerms))
                            {
                                echo " checked=\"checked\"";
                            }
                            echo " /></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <input type="hidden" name="action" value="saveRole" />
                    <input type="hidden" name="roleID" value="<?= $get_roleID; ?>" />
                    <input type="submit" name="Submit" value="Submit" />
                </form>
                <?php
                if ($get_roleID != '')
                {
                    ?>
                    <form method="post">
                        <input type="hidden" name="action" value="delRole" />
                        <input type="hidden" name="roleID" value="<?= $get_roleID; ?>" />
                        <input type="submit" name="Delete" value="Delete" />
                    </form>
                <?php } ?>
                <form method="post">
                    <input type="submit" name="Cancel" value="Cancel" />
                </form>
            <?php 
        }} ?>
    </div>
</body>
</html>