<?php

/**
 * Description of database
 *
 * @author randion
 */
class Database {

    private const DRIVER = "mysql";
    private const HOST = "localhost";
    private const DBNAME = "codeofaninja_db";
    private const USERNAME = "dwes";
    private const PASSWORD = "abc123.";

    /* Código modificado. Contiene singleton database */

    private static $conn;
    

     private function __construct() {
        
    }

    function __clone() {
        
    }

    function __wakeup() {
        
    }

    function __sleep() {
        
    }

    public static function getConnection() {
        if (null !== self::$conn) {
            return self::$conn;
        }

        try {
            self::$conn = new PDO(self::DRIVER . ":host=" . self::HOST . ";dbname=" . self::DBNAME, self::USERNAME, self::PASSWORD);
            // Esta línea fue añadida por el tutorial api-rest 
            self::$conn->exec('set names utf8');
        } catch (PDOException $exception) {
            //   \PDOException $exception( $exception->getMessage(), $exception->getCode());
            echo "Connection error: " . $exception->getMessage();
        }

        return self::$conn;
    }

    /*  Fin de Singleton */


// código oritinal   =======================================================
//  public $conn = null;
//
//  public function getConnection() {
//      
//      
//    try {
//      $this->conn = new PDO(self::DRIVER . ":host=" . self::HOST . ";dbname=" . self::DBNAME, self::USERNAME, self::PASSWORD);
//      // Esta línea fue añadida por el tutorial api-rest 
//      $this->conn->exec('set names utf8');
//    } catch (PDOException $exception) {
//      echo "Connection error: " . $exception->getMessage();
//    }
//
//    return $this->conn;
//  }
}

?>



