<?php

    try {
        echo "*** try *** <br/>";

        if (!file_exists('require_arquivo_exemplo.php')) {
            throw new Exception("Nao encontrado o arquivo </br>", 1);
            
        }
    } catch(Exception $ecep){
        echo $ecep.'<br/>';
    }  
    
    finally{
        echo "*** Finally ***";
    }







?>
