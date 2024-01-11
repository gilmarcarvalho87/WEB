<?php 
    class Pessoa{
        public $nome = null;

        function __construct($nome){         
            $this-> $nome =$nome;
        }

        function __get($atributo){
            return $this-> $atributo;
        }
        function correr(){
             return $this->__get('nome').' está correndo';
        }


    }

    $pessoa = new Pessoa('Gilmar');
    echo $pessoa -> __get('nome');       




?>