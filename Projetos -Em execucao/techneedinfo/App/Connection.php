<?php
namespace App;

use PDO;
use PDOException;

class Connection{

    public static function getDB(){
        try {
            $conn =new \PDO(
                "mysql:host=localhost;dbname=tech_need_db;charset=utf8",
                "gilmar",
                "FELIZNATAL"    
            ); 
            return $conn;           
        } catch (\PDOException $e) {
            echo $e;
           
        }


    }


}





?>