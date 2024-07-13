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
       
            $this->view->erroCadastro = false; 
            $this->render('inscreverse');
        }
        public function registrar(){        
            //receber os dados do front com Post
            $usuario = Container::getModel("usuario");
            $usuario->__set("nome",$_POST['nome']);
            $usuario->__set("email",$_POST['email']);
            $usuario->__set("senha",$_POST['senha']);

            
            //validar
            if ($usuario->validar() && count($usuario->getUsuarioPorEmail()) == 0) {                                               
                
                $this->render("cadastro");
                $usuario->salvar();
                }else {
                    $this->view->usuario= array(
                        "nome" =>$_POST['nome'],
                        "email" =>$_POST['email'],
                        "senha" =>$_POST['senha']
                    );
                    $this->view->erroCadastro = true;
                    $this->render("inscreverse");
                }
    
                
            }  
           
                         
                
          
    
         



        }
        
       
    




?>