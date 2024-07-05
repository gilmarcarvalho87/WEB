<?php

namespace App;
use MF\Init\Bootstrap;


class Route extends Bootstrap{

   
    protected function initRoutes(){
        $routes['home']=array(
            "route"=>"/",
            "controller"=>"indexcontroller",
            "action"=>"index"
        );
        $routes['sobre_nos']=array(
            "route"=>"/sobre_nos",
            "controller"=>"indexcontroller",
            "action"=>"sobre_nos"
        );
        $routes['contato']=array(
            "route"=>"/contato",
            "controller"=>"indexcontroller",
            "action"=>"contato"
        );
      
       $this->setRoutes($routes);
     
    }
   
}

?>