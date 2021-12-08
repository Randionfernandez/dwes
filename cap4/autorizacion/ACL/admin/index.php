<?php
include("../assets/php/database.php");
include("../assets/php/class.acl.php");

$myACL = new ACL();
if (!$myACL->hasPermission('access_admin'))
{
    header("location: ../index.php");
}
?><!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ACL Test</title>
        <link href="../assets/css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="header"></div>
        <div id="adminButton"><a href="../">Main Screen</a></div>
        <div id="page">
            <h2>Select an Admin Function:</h2>
            <a href="users.php">Manage Users</a><br />
            <a href="roles.php">Manage Roles</a><br />
            <a href="perms.php">Manage Permissions</a><br />
        </div>
    </body>
</html>