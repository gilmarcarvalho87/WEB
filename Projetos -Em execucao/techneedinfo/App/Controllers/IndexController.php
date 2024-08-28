<?php

namespace App\Controllers;

//imports
use MF\Controller\Action;
use MF\Model\Container;



class  IndexController extends Action{       
   

        public function index(){     
            $this->view->erroLogin= isset($_GET['login']) ? $_GET['login'] : "";
            $this->render('index');
        }
        public function home(){
            $this->render('home');
        }
        
       
}




?>