<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;



class  IndexController extends Action{  
     

        public function index(){        
            $this->render('index');
        }
        public function inscreverse(){        
            $this->render('inscreverse');
        }
        public function registrar(){        
            //receber os dados do front com Post
            echo"<pre>";
                print_r($_POST);
            //sucesso
            


            //erro



        }
        
       
    

}


?>