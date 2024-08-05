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


        /// ///// ver esta parte/////
        echo"<br/><br/>";
        $usuarios=Array();
       
        $pesquisa=$_GET["pesquisarPor"];
             
            if($pesquisa != ""){
                $usuario=Container::getModel("Usuario");
                $usuario->set__("nome",$_GET["pesquisa"]);
                $usuarios=$usuario->getAll();
                print_r($usuarios);
            }
       // $this->view->usuarios = $usuarios;
        
        $this->render('quemSeguir');
    }

}

?>