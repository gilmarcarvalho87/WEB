<?php
namespace App;

use PDO;
use PDOException;

class Connection{

    public static function getDB(){
        try {
            $conn =new \PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                ""    
            ); 
            return $conn;           
        } catch (\PDOException $e) {
            echo $e;
           
        }


    }


}





?>