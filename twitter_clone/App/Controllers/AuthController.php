<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;



class  AuthController extends Action{  

        public function autenticar(){  
         $usuario = Container::getModel('usuario');   

         $usuario->__set('email',$_POST['email']);   
         $usuario->__set('senha',$_POST['email']);   

         $usuario->autenticar();
         echo"<pre>";
         print_r($usuario);
        }

       
    
    }



?>