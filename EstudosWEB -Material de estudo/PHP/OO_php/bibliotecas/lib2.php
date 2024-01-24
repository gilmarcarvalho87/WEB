<?php
namespace B;

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






?>