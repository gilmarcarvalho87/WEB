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
            $usuario = Container::getModel("usuario");
            $usuario->__set("nome",$_POST['nome']);
            $usuario->__set("email",$_POST['email']);
            $usuario->__set("senha",$_POST['senha']);

            //validacao
            if ($usuario->validar()) {
                $usuario->salvar();
                $this->render('inscreverse');
            }

    
          // $this->render('inscreverse');  
            


            //erro



        }
        
       
    

}


?>