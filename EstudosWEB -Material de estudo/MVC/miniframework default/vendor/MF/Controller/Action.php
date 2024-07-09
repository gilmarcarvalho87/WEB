<?php

namespace MF\Controller;

abstract class Action{

    protected $view;
      
    public function __construct(){
        $this->view = new \stdClass();
    } 
    protected function render($view,$layout){        
            $this->view->page=$view;        
            if (file_exists("../App/Views/index/".$layout.".phtml")) {
                require_once"../App/Views/index/".$layout.".phtml";    
            }else{
                echo"<h1>Pagina não definida certa";             
            }
     
    }
    protected function content(){
        $nomeControl= get_class($this);
        $nomeControl= str_replace('App\\Controllers\\','',$nomeControl);
        $nomeControl=strtolower(str_replace('Controller','', $nomeControl));
        require_once"../App/Views/".$nomeControl."/".$this->view->page.".phtml";

    }

        
 
 
}


?>