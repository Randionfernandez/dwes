<?php
class ACL {

    var $perms = array();  //Array : Stores the permissions for the user
    var $userID = 0;  //Integer : Stores the ID of the current user
    var $userRoles = array(); //Array : Stores the roles of the current user
    private $conn;

    function __construct($userID = '')
    {
        if ($userID != '')
        {
            $this->userID = floatval($userID);
        }
        else
        {
            $this->userID = floatval($_SESSION['userID']);
        }
        $this->conn = getConexion();
        //$this->userRoles = $this->getUserRoles('ids');
        $this->userRoles = $this->getUserRoles();  // no parece necesario el parámetro 'ids'

        $this->buildACL();
    }

    function ACL($userID = '')
    {
        $this->__construct($userID);
//crutch for PHP4 setups
    }

    function buildACL()
    {
//first, get the rules for the user's role
        if (count($this->userRoles) > 0)
        {
            $this->perms = array_merge($this->perms, $this->getRolePerms($this->userRoles));
        }
//then, get the individual user permissions
        $this->perms = array_merge($this->perms, $this->getUserPerms($this->userID));
    }

    function getPermKeyFromID($permID)
    {
        $strSQL = "SELECT `permKey` FROM `permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
        $rows = $this->conn->query($strSQL);
        $row = $rows->fetch();
        return $row[0];
    }

    function getPermNameFromID($permID)
    {
        $strSQL = "SELECT `permName` FROM `permissions` WHERE `ID` = " . floatval($permID) . " LIMIT 1";
        $rows = $this->conn->query($strSQL);
        $row = $rows->fetch();
        return $row[0];
    }

    function getRoleNameFromID($roleID)
    {
        $strSQL = "SELECT `roleName` FROM `roles` WHERE `ID` = " . floatval($roleID) . " LIMIT 1";
        $rows = $this->conn->query($strSQL);
        $row = $rows->fetch();
        return $row[0];
    }

    /**
     * Retorna todos los roles del usuario.
     * 
     * @return array $resp Matriz con tantas filas como relaciones user_roles existen.
     */
    function getUserRoles()
    {
        $resp = array();

        $strSQL = "SELECT * FROM `user_roles` WHERE `userID` = "
                . floatval($this->userID) . " ORDER BY `addDate` ASC";

        $rows = $this->conn->query($strSQL);
        foreach ($rows as $row) {
            $resp[] = $row['roleID'];
        }
        return $resp;
    }

    /**
     * Devuelve todos los roles de la tabla Roles.
     * 
     * Si $format='ids'  (el default) la matriz de roles devuelve el campo identificador.
     * Si $format='full' la matriz devuelve los campos ID y roleName.
     * 
     * @param string $format Puede ser 'ids' o 'full' 
     * @return array $resp Matriz con tantas filas como roles tiene el sistema.
     */
    function getAllRoles($format = 'ids')
    {
        $resp = array();

        $format = strtolower($format);
        $strSQL = "SELECT * FROM `roles` ORDER BY `roleName` ASC";
        $rows = $this->conn->query($strSQL);
        foreach ($rows as $row) {
            if ($format == 'full')
            {
                $resp[] = array("ID" => $row['ID'], "Name" => $row['roleName']);
            }
            else
            {
                $resp[] = $row['ID'];
            }
        }
        return $resp;
    }

    /**
     * Devuelve todos los permisos de la tabla 'permmissions'.
     * 
     * Si $format='ids'  (el default) la matriz de permisos devuelve el campo identificador: 'ID'.
     * Si $format='full' la matriz devuelve los campos ID, permName y permKey ordenados por permName.
     * 
     * @param string $format Puede ser 'ids' (default) o 'full' 
     * @return array $resp Matriz con tantas filas como permisos tiene el sistema.
     */
    function getAllPerms($format = 'ids')
    {
        $format = strtolower($format);
        $strSQL = "SELECT * FROM `permissions` ORDER BY `permName` ASC";
        $rows = $this->conn->query($strSQL, PDO::FETCH_ASSOC);
        $resp = array();
        foreach ($rows as $row) {
            if ($format == 'full')
            {
                $resp[$row['permKey']] = array('ID' => $row['ID'], 'Name' => $row['permName'],
                    'Key' => $row['permKey']);
            }
            else
            {
                $resp[] = $row['ID'];
            }
        }
        return $resp;
    }

    /**
     * 
     * @param type $role
     * @return boolean
     */
    function getRolePerms($role)
    {
        if (is_array($role))
        {
            $roleSQL = "SELECT * FROM `role_perms` WHERE `roleID` IN (" . implode(",", $role) . ")" . " ORDER BY `ID` ASC";
        }
        else
        {
            $roleSQL = "SELECT * FROM `role_perms` WHERE `roleID` = " . floatval($role) . " ORDER BY `ID` ASC";
        }
        $rows = $this->conn->query($roleSQL);
        $perms = array();
        foreach ($rows as $row) {
            $pK = strtolower($this->getPermKeyFromID($row['permID']));
            if ($pK == '')
            {
                continue;
            }
            if ($row['value'] === '1')
            {
                $hP = true;
            }
            else
            {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK, 'inheritted' => true, 'value' => $hP,
                'Name' => $this->getPermNameFromID($row['permID']), 'ID' => $row['permID']);
        }
        return $perms;
    }

    /**
     * 
     * @param type $userID
     * @return boolean
     */
    function getUserPerms($userID)
    {
        $strSQL = "SELECT * FROM `user_perms` WHERE `userID` = " . floatval($userID) .
                " ORDER BY `addDate` ASC";
        $rows = $this->conn->query($strSQL);
        $perms = array();
        foreach ($rows as $row) {
            $pK = strtolower($this->getPermKeyFromID($row['permID']));
            if ($pK == '')
            {
                continue;
            }
            if ($row['value'] == '1')
            {
                $hP = true;
            }
            else
            {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK, 'inheritted' => false, 'value' => $hP,
                'Name' => $this->getPermNameFromID($row['permID']), 'ID' => $row['permID']);
        }
        return $perms;
    }

    /**
     * 
     * @param type $roleID
     * @return boolean
     */
    function userHasRole($roleID)
    {
        foreach ($this->userRoles as $k => $v) {
            if (floatval($v) === floatval($roleID))
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Dado un permiso, retorna cierto si el usuario lo tiene en su ACL con un valor '1' o true.
     * 
     * @param type $permKey
     * @return boolean
     */
    function hasPermission($permKey)
    {
        $permKey = strtolower($permKey);
        if (array_key_exists($permKey, $this->perms))
        {
            return (($this->perms[$permKey]['value'] === '1') || ($this->perms[$permKey]['value'] === TRUE));
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Devuelve el nombre del usuario cuyo ID se pasa como parámetro.
     * 
     * @param int $userID
     * @return type
     */
    function getUsername($userID)
    {
        $strSQL = "SELECT `username` FROM `users` WHERE `ID` = " . floatval($userID) . " LIMIT 1";
        $rows = $this->conn->query($strSQL);
        $row = $rows->fetch();
        return $row[0];
    }

}
