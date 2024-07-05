<?php
namespace App;


class Connection{

    public function getDB(){
        try {
            $conn =new PDO(
                "mysql:host=localhost;dbname=mvc;charset=uft8",
                "root",
                ""    
            );            
        } catch (PDOException $e) {
            echo $e;
           
        }


    }


}





?>