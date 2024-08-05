<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;



class  AuthController extends Action{  

    public function autenticar(){  

         //criamos uma instancia 
         $usuario = Container::getModel('usuario');   

         //capturamos e setamos os atributos abaixo
         $usuario->__set('email',$_POST['email']);   
         $usuario->__set('senha',$_POST['senha']);   
  
         $usuario->autenticar();
    
         if ($usuario->__get('id') != '' && $usuario->__get('nome') != ''){
           
            session_start();
            $_SESSION['id']=$usuario->__get("id");
            $_SESSION['nome']=$usuario->__get("nome");
            

            header('Location: /timeline');
           
         }else{
            header('Location: /?login=erro');
           
    
         }          
         
      
    }
    public function sair(){
      session_start();
      session_destroy();
      header("Location:/");
    }
   
}


?>