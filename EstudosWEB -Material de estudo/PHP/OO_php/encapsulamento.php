<?php 

    class Pai{
        public $humor='Feliz';
        protected $sobreNome='Silva';
        private $nome='Jorge';

        //metodos magicos
        function __get($variavel){
            return $this->$variavel;
        }    
        function __set($variavel,$valor){
            $this->$variavel=$valor;
        } 

        private function  executarMania(){echo'assobiar...';}
        protected function responder(){echo 'oi..';}
        public  function  executarAcao(){ 
            $this->executarMania(); 
            echo '<br>';
            $this->responder();
        }

    }

    $pai =new Pai();

    

    //protected
    echo $pai->__get('nome');
    echo'<br>';

    $pai->__set('nome','Gilmar');

    echo $pai->__get('nome');
    echo'<br><hr>';

    echo $pai-> executarAcao();

 
  






?>