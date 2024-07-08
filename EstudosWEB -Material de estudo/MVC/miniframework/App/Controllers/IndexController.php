<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Produto;
use App\Models\Info;



class  IndexController extends Action{  
     

        public function index(){           
            $produto= Container::getModel('produto');  
            $produto=$produto->getProdutos();
            $this->view->dados=$produto;
            $this->render("index","layout1");
        }
        
        public function sobre_nos(){
        
            $info=Container::getModel('info');  
            $informacoes=$info->getInfo();
            $this->view->dados=$informacoes;           
            $this->render("sobre_nos","layout1");
        }
        public function contato(){
            //$this->view->dados= array("Numero da residencia","Endereço de morada ","conselho");
            $this->render("contato","layout1");
        }
    

}


?>