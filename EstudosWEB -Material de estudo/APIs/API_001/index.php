<?php 

//definido a constante que controla o fluxo de entrada da aplicação
define('CONTROL', true);

//incluir arquivos
$routes= require_once('inc/routes.php');
 require_once('inc/api_consumer.php');

//definir rota
$route= $_GET['route'] ?? 'home';

if(!in_array($route,$routes)){
   $route='404'; 
}

switch ($route) {
    case 'home':
        require_once 'inc/header.php'; 
        require_once 'scripts/home.php'; 
        require_once 'inc/footer.php'; 
        break;
    case 'country':
        require_once 'inc/header.php'; 
        require_once 'scripts/country.php'; 
        require_once 'inc/footer.php'; 
        break;
    case '404':
        require_once 'inc/header.php'; 
        require_once 'scripts/404.php'; 
        require_once 'inc/footer.php'; 
        break;
    
  
}
?>