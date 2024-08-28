<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;




class  AuthController extends Action{  

    public function autenticar(){  
  
          //criamos uma instancia 
         $usuario = Container::getModel('usuario');  

         //capturamos e setamos os atributos da  classe model Usuario
         $usuario->__set('usuario',$_POST['usuario']);   
         $usuario->__set('senha',$_POST['senha']);   
  
         $usuario->autenticar();
        
     
         if ($usuario->__get('id') != '' && $usuario->__get('usuario') != ''){
           
            session_start();
            $_SESSION['id']=$usuario->__get("id");
            $_SESSION['nome']=$usuario->__get("usuario");
            
      
          header('Location: /home');
           
         }else{                 
            header('Location: /');  
         }          
  

    }
    public function sair(){
      session_start();
      session_destroy();
      header("Location:/");
    }
   
}


?>