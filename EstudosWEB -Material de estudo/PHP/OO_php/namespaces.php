<?php
//---------------------------------------------------------------
namespace ladoA;
    class Cliente implements cadastroInterface{
        public $nome='Victor';

        public function __construct(){
            echo'<pre>';
            print_r(get_class_methods($this));        
        } 

        public function __get($attr){
                return $this -> $attr;
        }
        public function  salvar(){
            echo'Salvo';
        }
    
    
    }
    interface cadastroInterface{
        public function salvar();
    }

//--------------------------------------------------------------
namespace ladoB;
    class Cliente implements cadastroInterface{
        public $nome='Gilmar';

        public function __construct(){
            echo'<pre>';
            print_r(get_class_methods($this));        
        }

        public function __get($attr){
                return $this -> $attr;
        }
        public function  deletar(){
            echo'Deletado';
        }
    }
    interface cadastroInterface{
        public function deletar();
    }
//---------------------------------------------------------------

    $c = new \ladoa\Cliente();
 /*   print_r($c);
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo $c -> __get('nome');
  */

 



?>