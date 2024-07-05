<?php

namespace App\Controllers;

use MF\Controller\Action;

class IndexController extends Action{  
     

        public function index(){
            $this->view->dados= array("cadeira","mesa","toalha");
            $this->render("index","layout3");
        }
        public function sobre_nos(){
            $this->view->dados= array("Portatil","telemovel","Secretaria de mesa");
            $this->render("sobre_nos","layout1");
        }
        public function contato(){
            $this->view->dados= array("Numero da residencia","Endereço de morada ","conselho");
            $this->render("contato","layout1");
        }
    

}


?>