<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;



class  AppController extends Action{  

    public function timeline(){
       
            //verifica se esta autenticado
            $this->validaAutenticacao();  

            //instanciamos o usuario
            $tweet= Container::getModel("Tweet");

            //setamos o usuario correspondente da sessao
            $tweet->__set("id_usuario",$_SESSION['id']);

            //recuperamos somente os tweets do usuario setado
            $tweets=$tweet->getAll();
           
            //salvamos o array no atributo dinamico 
            $this->view->tweets= $tweets;
       
            $this->render('timeline');
    }   
    public function tweet(){
            $this->validaAutenticacao();
            $tweet = Container::getModel('Tweet');
            $tweet->__set('tweet', $_POST['tweet']);
            $tweet->__set('id_usuario', $_SESSION['id']);
            $tweet->salvar();           
            header('Location: /timeline');
            exit();
       
    }
    public function validaAutenticacao(){
        session_start();
        if (!isset($_SESSION['id']) || $_SESSION['id'] == "" || !isset($_SESSION['nome']) || $_SESSION['nome'] == "") { 
             header('Location: /?login=erro');
        }   
    }
    public function quemSeguir(){
        $this->validaAutenticacao();              
        $usuarios=array();
       
        ///////// tem que refatorar por nao aparece os pesquisados ////// 
        $pesquisaPor= isset($_GET['pesquisarPor'])? $_GET['pesquisarPor']:"";       
           
        if($pesquisaPor != ''){    
                $usuario= Container::getModel('Usuario');
                $usuario->set__('nome',$pesquisaPor);
                $usuario->set__('id',$_SESSION['id']);
                $usuarios=$usuario->getAll(); 
        }             
            
        $this->view->usuarios = $usuarios;        
        $this->render('quemSeguir');
    
    }
    public function acao(){
        $this->validaAutenticacao();
        
        //verifica se esta setado 
        $acao= isset($_GET['acao']) ? $_GET['acao'] : ""; 
        $id_usuario_seguindo= isset($_GET['id_usuario']) ? $_GET['id_usuario'] : ""; 

        //craaimos a instancia de usuario e setamos o id 
        $usuario = Container::getModel('Usuario');
        $usuario->__set("id",$_SESSION['id']);

        //verificamos a rota 
        if($acao == 'seguir'){
            $usuario->seguirUsuario($id_usuario_seguindo);   
         } else if($acao == 'deixar_de_seguir'){
            $usuario->deixarseguirUsuario($id_usuario_seguindo);
         }
         
         
    }         
}
?>