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
        $routes['inscreverse']=array(
            "route"=>"/inscreverse",
            "controller"=>"indexcontroller",
            "action"=>"inscreverse"
        );
      
      
       $this->setRoutes($routes);
     
    }
   
}

?>